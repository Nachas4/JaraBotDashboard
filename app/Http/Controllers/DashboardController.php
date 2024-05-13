<?php

namespace App\Http\Controllers;
use App\Models\DcGuild;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function general($server)
    {
        if (!DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        if (config('app.env') === 'local') {
            return view('dashboard.general', ['server' => $server, 'page' => 'general']);    
        }

        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }

        return view('dashboard.general', ['server' => $server, 'page' => 'general']);
    }

    public function fun($server)
    {
        if (!DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        if (config('app.env') === 'local') {
            return view('dashboard.fun', ['server' => $server, 'page' => 'fun']);
        }

        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }

        return view('dashboard.fun', ['server' => $server, 'page' => 'fun']);
    }

    public function miniGame($server)
    {
        if (!DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        if (config('app.env') === 'local') {
            return view('dashboard.minigame', ['server' => $server, 'page' => 'minigame']);
        }

        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }

        return view('dashboard.minigame', ['server' => $server, 'page' => 'minigame']);
    }

    public function moderation($server)
    {
        if (!DcGuild::where('guild_id', $server)->exists()) {
            return back();
        }

        if (config('app.env') === 'local') {
            return view('dashboard.moderation', ['server' => $server, 'page' => 'moderation']);
        }

        if (Auth::check() && DcGuild::find($server)->owner_id !== Auth::user()->id) {
            return back();
        }
        
        return view('dashboard.moderation', ['server' => $server, 'page' => 'moderation']);
    }
}
