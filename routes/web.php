<?php

use App\Http\Controllers\DiscordController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('servers'); //Originally 'welcome'
});

Route::get('/docs', function () {
    return view('docs/general');
});

Auth::routes();


/*
    |--------------------------------------------------------------------------
    | Discord OAuth2 Login Routes
    |--------------------------------------------------------------------------
    */

Route::get('/login/discord', [DiscordController::class, 'RedirectToDiscord'])->name('discord.login');
Route::get('/login/discord/callback', [DiscordController::class, 'OAuthCallback']);



/** Only for logged in users **/
Route::middleware(Authenticate::class)->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});