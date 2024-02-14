<?php

namespace App\Http\Controllers;

use App\Models\DcGuild;
use App\Models\User;
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
        $discordOAuthUrl = config('discord.oauth2_login_url');
        return redirect($discordOAuthUrl);
    }


    public function OAuthCallback(Request $request)
    {
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
            return view('welcome', ['error' => 'There was an error while logging in using Discord.']);
        }

        // After a successful response, extract user data
        $userData = Http::withToken($access_token)->get('https://discord.com/api/users/@me')->json();
        $userPfpExt = DiscordController::getPfpExt($userData['id'], $userData['avatar']);

        //Create new or update existing user
        $success = false;
        $user = User::where('user_id', $userData['id']);
        if (count($user->get()) !== 0) {
            $user->update([
                'username' => $userData['username'],
                'global_name' => $userData['global_name'],
                'avatar' => '' . $userData['avatar'] . '.' . $userPfpExt . '',
                'banner_color' => $userData['banner_color'],
                'mfa_enabled' => $userData['mfa_enabled'],

                'access_token' => Hash::make($access_token)
            ]);

            $success = true;
        } else {
            $userData = [
                'user_id' => $userData['id'],
                'username' => $userData['username'],
                'global_name' => $userData['global_name'],
                'avatar' => '' . $userData['avatar'] . '.' . $userPfpExt . '',
                'banner_color' => $userData['banner_color'],
                'mfa_enabled' => $userData['mfa_enabled'],

                'access_token' => Hash::make($access_token)
            ];

            $success = DiscordController::register($userData);
        }

        if ($success) {
            $user = $user->get()[0];

            //create, update or delete guild info belonging to user
            $userGuilds = Http::withToken($access_token)->get('https://discord.com/api/users/@me/guilds')->json();
            DiscordController::reCheckUserGuilds($user->id, $userGuilds);
            
            $this->guard()->login($user);

            return view('dashboard');
        } else {
            User::where('user_id', $userData['id'])->forceDelete();
            
            return view('welcome', ['error' => 'There was an error while logging in using Discord.']);
        }
    }

    private function reCheckUserGuilds($owner_id, $currentGuilds)
    {
        foreach ($currentGuilds as $guild) {
            //We only care about guilds belonging to user
            if (!$guild['owner'])
            continue;
            
            $guildIconExt = DiscordController::getIconExt($guild['id'], $guild['icon']);
        
            //Create new or update existing guild
            $dcGuild = DcGuild::where('guild_id', $guild['id']);
            if (count($dcGuild->get()) !== 0) {
                $dcGuild->update([
                    'guild_id' => $guild['id'],
                    'name' => $guild['name'],
                    'icon' => '' . $guild['icon'] . '.' . $guildIconExt . '',
                    'owner_id' => $owner_id
                ]);
            } else {
                $dcGuild = new DcGuild([
                    'guild_id' => $guild['id'],
                    'name' => $guild['name'],
                    'icon' => '' . $guild['icon'] . '.' . $guildIconExt . '',
                    'owner_id' => $owner_id
                ]);
                
                $dcGuild->save();
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
            
            if ($shouldDelete) $guild->delete();
        }

        //No need to search for restorable guilds, as deleteing a guild in discord is permanent.
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  array $userData
     */
    public function register($userData)
    {
        try {
            $this->validator($userData)->validate();

            event(new Registered($user = $this->create($userData)));

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
            'access_token' => ['required', 'string'],
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
            'access_token' => Hash::make($data['access_token']),
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