<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Discord Login Values
    |--------------------------------------------------------------------------
    |
    | This determines the values used for discord login and token for getting info about the guilds the bot is in.
    | Set this in your ".env" file.
    |
    */

    'client_id' => env('DISCORD_CLIENT_ID'),
    'client_secret' => env('DISCORD_CLIENT_SECRET'),
    'redirect_uri' => env('DISCORD_REDIRECT_URI'),
    'oauth2_login_url' => env('DISCORD_OAUTH2_LOGIN_URL'),
    'discord_bot_token' => env('DISCORD_BOT_TOKEN')
];