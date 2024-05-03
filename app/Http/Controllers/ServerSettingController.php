<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateServerSettingRequest;
use App\Models\ServerSetting;

class ServerSettingController extends Controller
{
    /**
     * * Store a newly created resource or update one in storage.
     */
    public function storeOrUpdate(StoreOrUpdateServerSettingRequest $request)
    {
        $data = (object) $request->all();

        $serversettings = ServerSetting::where('dc_guild_id', $data->dc_guild_id)->first();

        if ($serversettings !== null) {
            $serversettings->update([
                //If value from $data->key is empty (false), then use existing value, otherwise set column value to 1 (true)
                'auto_responses_enabled' => empty($data->auto_responses_enabled) ? $serversettings->auto_responses_enabled : 1,
                'quotes_enabled' => empty($data->quotes_enabled) ? $serversettings->quotes_enabled : 1,
                'pickups_enabled' => empty($data->pickups_enabled) ? $serversettings->pickups_enabled : 1,
                'welcome_messages_enabled' => empty($data->welcome_messages_enabled) ? $serversettings->welcome_messages_enabled : 1,
                'mod_message_channels_enabled' => empty($data->mod_message_channels_enabled) ? $serversettings->mod_message_channels_enabled : 1,
                'blacklist_enabled' => empty($data->blacklist_enabled) ? $serversettings->blacklist_enabled : 1,
                'auto_roles_enabled' => empty($data->auto_roles_enabled) ? $serversettings->auto_roles_enabled : 1
            ]);
        } else {
            // This should realistically never be null, because a default ServerSetting model is created upon saving a guild (but do keep this for safety reasons)
            ServerSetting::create([
                'dc_guild_id' => $data->dc_guild_id,
                'auto_responses_enabled' => empty($data->auto_responses_enabled),
                'quotes_enabled' => empty($data->quotes_enabled),
                'pickups_enabled' => empty($data->pickups_enabled),
                'welcome_messages_enabled' => empty($data->welcome_messages_enabled),
                'mod_message_channels_enabled' => empty($data->mod_message_channels_enabled),
                'blacklist_enabled' => empty($data->blacklist_enabled),
                'auto_roles_enabled' => empty($data->auto_roles_enabled)
            ]);
        }

        return response()->json(["success" => "Successfully updated Server Settings."]);
    }
}
