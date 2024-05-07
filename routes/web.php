<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AutoResponseController;
use App\Http\Controllers\AutoRoleController;
use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscordController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\ModMessageChannelController;
use App\Http\Controllers\PickupLineController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ServerSettingController;
use App\Http\Controllers\WelcomeMessageController;
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
    return view('welcome');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Documentation Routes
|--------------------------------------------------------------------------
*/
Route::get('/docs', function () {
    return view('layouts.docs-dashboard');
})->name('docs');

//jQuery dynamic page loading used here
Route::get('/docs/{module}', [DocsController::class, 'load_module'])->name('doc.module');

/*
|--------------------------------------------------------------------------
| Discord OAuth2 Login Routes
|--------------------------------------------------------------------------
*/
Route::get('/login/discord', [DiscordController::class, 'RedirectToDiscord'])->name('discord.login');
Route::get('/login/discord/callback', [DiscordController::class, 'OAuthCallback']);


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

/** Only for logged in users **/
Route::middleware(Authenticate::class)->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/general/{server}', [DashboardController::class, 'general'])->name('dashboard.general');
    Route::get('/dashboard/fun/{server}', [DashboardController::class, 'fun'])->name('dashboard.fun');
    Route::get('/dashboard/moderation/{server}', [DashboardController::class, 'moderation'])->name('dashboard.moderation');
    Route::get('/dashboard/minigame/{server}', [DashboardController::class, 'miniGame'])->name('dashboard.minigame');

    /* Ajax POST template for saving automatically to DB */
    Route::post('/save-autoResps', [AutoResponseController::class, 'storeOrUpdate'])->name('autoResps.save');
    Route::post('/save-autoRoles', [AutoRoleController::class, 'storeOrUpdate'])->name('autoRoles.save');
    Route::post('/save-blacklist', [BlacklistController::class, 'storeOrUpdate'])->name('blacklist.save');
    Route::post('/save-moderators', [ModeratorController::class, 'storeOrUpdate'])->name('moderators.save');
    Route::post('/save-modMsgChs', [ModMessageChannelController::class, 'storeOrUpdate'])->name('modMsgChs.save');
    Route::post('/save-wMsg', [WelcomeMessageController::class, 'storeOrUpdate'])->name('wMsg.save');
    Route::post('/save-pickups', [PickupLineController::class, 'storeOrUpdate'])->name('pickups.save');
    Route::post('/save-serverSetts', [ServerSettingController::class, 'storeOrUpdate'])->name('serverSetts.save');
    Route::post('/save-quotes', [QuoteController::class, 'storeOrUpdate'])->name('quotes.save');
});