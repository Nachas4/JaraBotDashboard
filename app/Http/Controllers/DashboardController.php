<?php

namespace App\Http\Controllers;

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
}
