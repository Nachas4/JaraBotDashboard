<?php

namespace App\Http\Controllers;

use App\Models\AccessToken;
use App\Models\Blacklist;
use App\Models\DcGuild;
use App\Models\ServerSetting;
use App\Models\User;
use App\Models\WelcomeMessage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class DiscordController extends Controller
{
    public function RedirectToDiscord()
    {
        if (Auth::check()) {
            $userGuilds = Auth::user()->owned_guilds()->get();

            if ($userGuilds)
                return redirect()->route('dashboard.general', ['server' => $userGuilds[0]->guild_id]);
            else
                return redirect()->route('welcome')->with(['message' => 'You do not have any owned servers. If you wish to access the dashboard, you\'ll need to create one.']);
        }

        $discordOAuthUrl = config('discord.oauth2_login_url');
        return redirect($discordOAuthUrl);
    }


    public function OAuthCallback(Request $request)
    {
        if (str_contains($request->getRequestUri(), 'error=access_denied&error_description=The+resource+owner+or+authorization+server+denied+the+request')) {
            return redirect()->route('welcome');
        }

        // Retrieve the authorization code from the query parameters
        $code = $request->query('code');

        // Exchange the code for an access token
        $access_token = null;
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()
                ->post('https://discord.com/api/oauth2/token', [
                    'client_id' => config('discord.client_id'),
                    'client_secret' => config('discord.client_secret'),
                    'grant_type' => 'authorization_code',
                    'code' => $code,
                    'redirect_uri' => config('discord.redirect_uri'),
                    'scope' => 'identify%20guilds'
                ]);

            $access_token = $response['access_token'];
        } catch (\Throwable $th) {
            return redirect('welcome')->with('error', 'There was an error while logging in using Discord: ' . $th->getMessage());
        }

        // After a successful response, extract user data
        $userData = Http::withToken($access_token)->get('https://discord.com/api/users/@me')->json();

        $global_name = $userData['username'];
        if ($userData['global_name'] !== null) {
            $global_name = $userData['global_name'];
        }

        $avatar = 'PFP_placeholder';
        $userPfpExt = 'png';
        if ($userData['avatar'] !== null) {
            $avatar = $userData['avatar'];
            $userPfpExt = DiscordController::getPfpExt($userData['id'], $userData['avatar']);
        }

        $banner_color = '#5f9ea0';
        if ($userData['banner_color'] !== null) {
            $banner_color = $userData['banner_color'];
        }

        //Create new or update existing user
        $success = false;
        $user = User::where('user_id', $userData['id']);
        if (count($user->get()) !== 0) {
            $user->update([
                'username' => $userData['username'],
                'global_name' => $global_name,
                'avatar' => '' . $avatar . '.' . $userPfpExt . '',
                'banner_color' => $banner_color,
                'mfa_enabled' => $userData['mfa_enabled'],
            ]);

            $old_access_token = $user->get()[0]->access_token();
            $old_access_token->update([
                'access_token' => Hash::make($access_token)
            ]);

            $success = true;
        } else {
            $userData = [
                'user_id' => $userData['id'],
                'username' => $userData['username'],
                'global_name' => $global_name,
                'avatar' => '' . $avatar . '.' . $userPfpExt,
                'banner_color' => $banner_color,
                'mfa_enabled' => $userData['mfa_enabled'],
            ];

            $success = DiscordController::register($userData, Hash::make($access_token));
        }

        if ($success) {
            $user = $user->get()[0];

            //create, update or delete guild info belonging to user
            $userGuilds = Http::withToken($access_token)->get('https://discord.com/api/users/@me/guilds')->json();
            $userGuilds = DiscordController::processUserGuilds($user->id, $userGuilds);

            $this->guard()->login($user);

            if ($userGuilds)
                return redirect()->route('dashboard.general', ['server' => $userGuilds[0]->guild_id]);
            else
                return redirect()->route('welcome')->with(['message' => 'You do not have any owned servers. If you wish to access the dashboard, you\'ll need to create one.']);
        } else {
            User::where('user_id', $userData['id'])->forceDelete();

            return redirect('welcome')->with('error', 'There was an error while logging in using Discord.');
        }
    }

    private function processUserGuilds($owner_id, $currentGuilds)
    {
        foreach ($currentGuilds as $guild) {
            //We only care about guilds belonging to user
            if (!$guild['owner'])
                continue;

            $guildIcon = 'PH_placeholder_image';
            $guildIconExt = 'png';

            if ($guild['icon'] !== null) {
                $guildIcon = $guild['icon'];
                $guildIconExt = DiscordController::getIconExt($guild['id'], $guild['icon']);
            }

            //Create new or update existing guild
            $dcGuild = DcGuild::where('guild_id', $guild['id']);
            if (count($dcGuild->get()) !== 0) {
                $dcGuild->update([
                    'name' => $guild['name'],
                    'icon' => '' . $guildIcon . '.' . $guildIconExt . '',
                    'owner_id' => $owner_id
                ]);
            } else {
                $dcGuild = DcGuild::create([
                    'guild_id' => $guild['id'],
                    'name' => $guild['name'],
                    'icon' => '' . $guildIcon . '.' . $guildIconExt . '',
                    'owner_id' => $owner_id
                ]);

                //Also create the default ServerSettngs, Blacklist and Welcome Message models for this guild
                ServerSetting::create([
                    'dc_guild_id' => $dcGuild->id,
                    'auto_responses_enabled' => false,
                    'quotes_enabled' => true,
                    'pickups_enabled' => true,
                    'welcome_messages_enabled' => false,
                    'mod_message_channels_enabled' => false,
                    'blacklist_enabled' => true,
                    'auto_roles_enabled' => false
                ]);

                $words = ['kill', 'stab', 'murder', 'hurt', 'die'];
                $count = 0;

                while ($count < 5) {
                    Blacklist::create(['dc_guild_id' => $dcGuild->id, 'word' => $words[$count]]);
                    $count++;
                }

                WelcomeMessage::create([
                    'dc_guild_id' => $dcGuild->id,
                ]);
            }
        }


        //Determine if the $guild from the old collection still exists in the current collection; delete if not
        $oldGuilds = DcGuild::where('owner_id', $owner_id)->get();
        foreach ($oldGuilds as $guild) {

            $shouldDelete = true;
            foreach ($currentGuilds as $currentGuild) {
                if ($guild['guild_id'] === $currentGuild['id']) {
                    $shouldDelete = false;
                }
            }

            if ($shouldDelete)
                $guild->delete();
        }

        //No need to search for restorable guilds, as deleteing a guild in discord is permanent.

        return User::find($owner_id)->owned_guilds()->get();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  array $userData
     * @param  string $accessToken
     */
    public function register($userData, $accessToken)
    {
        try {
            $this->validator($userData)->validate();

            event(new Registered($user = $this->create($userData)));

            AccessToken::create([
                'user_id' => $user['id'],
                'access_token' => $accessToken
            ]);

            $this->guard()->login($user);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'string'],
            'username' => ['required', 'string'],
            'global_name' => ['required', 'string'],
            'avatar' => ['required', 'string'],
            'banner_color' => ['required', 'string'],
            'mfa_enabled' => ['required', 'boolean'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_id' => $data['user_id'],
            'username' => $data['username'],
            'global_name' => $data['global_name'],
            'avatar' => $data['avatar'],
            'banner_color' => $data['banner_color'],
            'mfa_enabled' => $data['mfa_enabled'],
        ]);
    }

    private function getPfpExt($user_id, $fileName)
    {
        return str_replace('image/', '', Http::get('https://cdn.discordapp.com/avatars/' . $user_id . '/' . $fileName . '')->header('Content-Type'));
    }

    private function getIconExt($guild_id, $fileName)
    {
        return str_replace('image/', '', Http::get('https://cdn.discordapp.com/icons/' . $guild_id . '/' . $fileName . '')->header('Content-Type'));
    }
}
