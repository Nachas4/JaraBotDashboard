<?php

namespace App\Http\Controllers;

use App\Models\AutoResponse;
use App\Models\AutoRole;
use App\Models\ServerSetting;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function general($server)
    {
        return view('dashboard.general', ['server' => $server, 'page' => 'general']);
    }

    public function fun($server)
    {
        return view('dashboard.fun', ['server' => $server, 'page' => 'fun']);
    }

    public function miniGame($server)
    {
        return view('dashboard.minigame', ['server' => $server, 'page' => 'minigame']);
    }

    public function moderation($server)
    {
        return view('dashboard.moderation', ['server' => $server, 'page' => 'moderation']);
    }

    //ajax auto save
    public function save(Request $request)
    {
        $data = (object) $request->all();

        /* Welcome Message */
        if ($data->toSave === "wMsgForm") {
            $wcmMsg = WelcomeMessage::where('dc_guild_id', $data->guildId)->first();

            if ($wcmMsg !== null) {
                if ($data->wMsg === null)
                    return response()->json(["error" => "Message cannot be null."]);
                if ($data->wMsgChannel === null)
                    return response()->json(["error" => "Channel cannot be null."]);

                $wcmMsg->update([
                    'channel_id' => $data->wMsgChannel,
                    'message' => $data->wMsg,
                    // 'bg_image' => $data->wMsgImg
                ]);
            } else {
                if ($data->wMsg === null)
                    return response()->json(["error" => "Message cannot be null."]);
                if ($data->wMsgChannel === null)
                    return response()->json(["error" => "Channel cannot be null."]);

                WelcomeMessage::create([
                    'dc_guild_id' => $data->guildId,
                    'channel_id' => $data->wMsgChannel,
                    'message' => $data->wMsg,
                    // 'bg_image' => $data->wMsgImg
                ]);
            }

            return response()->json(["success" => "Successfully updated the Welcome Message settings."]);
        }

        /* Autoroles */
        if ($data->toSave === "autoRolesForm") {
            $autoroles = AutoRole::where('dc_guild_id', $data->guildId)->get();

            if (empty($data->autoRoles))
                return response()->json(["error" => "Values cannot be null."]);

            foreach ($autoroles as $autorole)
                $autorole->delete();

            foreach ($data->autoRoles as $autorole) {
                AutoRole::create([
                    'dc_guild_id' => $data->guildId,
                    'role_id' => $autorole
                ]);
            }

            return response()->json(["success" => "Successfully updated the Autoroles settings."]);
        }

        /* Autoresponses */
        if ($data->toSave === "autoRespsForm") {
            $autoresponses = AutoResponse::where('dc_guild_id', $data->guildId)->get();

            if (empty($data->autoResponses))
                return response()->json(["error" => "Values cannot be null."]);

            foreach ($autoresponses as $autoresponse)
                $autoresponse->delete();


            $autoresponses_toAdd = explode('->', $data->autoResponses);

            foreach ($autoresponses_toAdd as $autoresponse) {
                trim($autoresponse);
                $autoresponse = explode(">", $autoresponse);

                AutoResponse::create([
                    'dc_guild_id' => $data->guildId,
                    'respond_to' => $autoresponse[0],
                    'respond_with' => $autoresponse[1]
                ]);
            }

            return response()->json(["success" => "Successfully updated the Autoresponses settings."]);
        }

        /* Server Settings */
        if ($data->toSave === "serverSettsForm") {
            $serversettings = ServerSetting::where('dc_guild_id', $data->guildId)->first();

            if ($serversettings !== null) {
                $serversettings->update([
                    //If value from $data->key is empty (false), then use existing value, otherwise set column value to 1 (true)
                    'auto_responses_enabled' => empty($data->auto_responses_enabled) ? $serversettings->auto_responses_enabled : 1,
                    'quotes_enabled' => empty($data->quotes_enabled) ? $serversettings->quotes_enabled : 1,
                    'pickups_enabled' => empty($data->pickups_enabled) ? $serversettings->pickups_enabled : 1,
                    'welcome_messages_enabled' => empty($data->welcome_messages_enabled) ? $serversettings->welcome_messages_enabled : 1,
                    'mod_message_channels_enabled' => empty($data->mod_message_channels_enabled) ? $serversettings->mod_message_channels_enabled : 1,
                    'quarantine_enabled' => empty($data->quarantine_enabled) ? $serversettings->quarantine_enabled : 1,
                    'blacklist_enabled' => empty($data->blacklist_enabled) ? $serversettings->blacklist_enabled : 1,
                    'auto_roles_enabled' => empty($data->auto_roles_enabled) ? $serversettings->auto_roles_enabled : 1
                ]);
            } else {
                // This should realistically never be null, because a default ServerSetting model is created upon saving a guild (but do keep this for safety reasons)
                ServerSetting::create([
                    'dc_guild_id' => $data->guildId,
                    'auto_responses_enabled' => empty($data->auto_responses_enabled),
                    'quotes_enabled' => empty($data->quotes_enabled),
                    'pickups_enabled' => empty($data->pickups_enabled),
                    'welcome_messages_enabled' => empty($data->welcome_messages_enabled),
                    'mod_message_channels_enabled' => empty($data->mod_message_channels_enabled),
                    'quarantine_enabled' => empty($data->quarantine_enabled),
                    'blacklist_enabled' => empty($data->blacklist_enabled),
                    'auto_roles_enabled' => empty($data->auto_roles_enabled)
                ]);
            }

            return response()->json(["success" => "Successfully updated Server Settings."]);
        }
    }
}
