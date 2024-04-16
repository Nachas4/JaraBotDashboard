<?php

namespace App\Http\Controllers;

use App\Models\AutoRole;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function General($server)
    {
        return view('dashboard.general', ['server' => $server, 'page' => 'general']);
    }

    public function Fun($server)
    {
        return view('dashboard.fun', ['server' => $server, 'page' => 'fun']);
    }

    public function MiniGame($server)
    {
        return view('dashboard.minigame', ['server' => $server, 'page' => 'minigame']);
    }

    public function Moderation($server)
    {
        return view('dashboard.moderation', ['server' => $server, 'page' => 'moderation']);
    }

    //ajax auto save
    public function save(Request $request)
    {
        $data = (object) $request->all();

        if ($data->wMsg != null) {
            /* Welcome Message */
            $wcmMsg = WelcomeMessage::where('guild_id', $data->guildId)->first();

            if ($wcmMsg != null) {
                $wcmMsg->update([
                    'channel_id' => $data->wMsgChannel,
                    'message' => $data->wMsg
                ]);
            } else {
                WelcomeMessage::create([
                    'guild_id'=> $data->guildId,
                    'channel_id'=> $data->wMsgChannel,
                    'message'=> $data->wMsg
                ]);
            }

            /* Autoroles */
            $autoroles = AutoRole::where('guild_id', $data->guildId)->get();
            
            foreach ($autoroles as $autorole) {
                if ($autorole != null) {
                    $autorole->update([
                        'role_id' => $data->wMsgChannel,
                        'message' => $data->wMsg
                    ]);
                } else {
                    WelcomeMessage::create([
                        'guild_id'=> $data->guildId,
                        'channel_id'=> $data->wMsgChannel,
                        'message'=> $data->wMsg
                    ]);
                }
            }

            return response()->json(["success" => $data->wMsg]);
        }
    }
}
