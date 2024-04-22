<?php

namespace App\Http\Controllers;

use App\Models\AutoRole;
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


        /* Autoroles */
        $autoroles = AutoRole::where('dc_guild_id', $data->guildId)->get();
        foreach ($autoroles as $autorole) $autorole->delete();
        
        foreach ($data->autoRoles as $autorole) {
            AutoRole::create([
                'dc_guild_id' => $data->guildId,
                'role_id' => $autorole // this is an array, needs better handling
            ]);
        }

        return response()->json(["success" => "Successfully updated the general settings."]);
    }
}
