<?php

namespace App\Http\Controllers;
use App\Models\DcGuild;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function general($server)
    {
        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }

        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.general', ['server' => $server, 'page' => 'general']);
    }

    public function fun($server)
    {
        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }

        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.fun', ['server' => $server, 'page' => 'fun']);
    }

    public function miniGame($server)
    {
        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }
        
        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.minigame', ['server' => $server, 'page' => 'minigame']);
    }

    public function moderation($server)
    {
        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }
        
        if (empty($server) || !DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        return view('dashboard.moderation', ['server' => $server, 'page' => 'moderation']);
    }
}
