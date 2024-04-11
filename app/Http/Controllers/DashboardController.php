<?php

namespace App\Http\Controllers;

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
    public function saveAutoMsg(Request $request)
    {
        $data = (object)$request->all();
        if ($data->wMsg != null) {
            DB::table('welcome_messages')->insert([
                'dc_guild_id' => 1,
                'message' => $data->wMsg,
            ]);
            return response()->json(["success" => $data->wMsg]);
        }
    }
}
