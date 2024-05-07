<?php

namespace App\Http\Controllers;
use App\Models\DcGuild;

class DashboardController extends Controller
{
    public function general($server)
    {
        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.general', ['server' => $server, 'page' => 'general']);
    }

    public function fun($server)
    {
        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.fun', ['server' => $server, 'page' => 'fun']);
    }

    public function miniGame($server)
    {
        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.minigame', ['server' => $server, 'page' => 'minigame']);
    }

    public function moderation($server)
    {
        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.moderation', ['server' => $server, 'page' => 'moderation']);
    }
}
