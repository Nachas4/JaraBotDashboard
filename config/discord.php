<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Discord Login Values
    |--------------------------------------------------------------------------
    |
    | This value determines the values used for discord login. Set this in your ".env" file.
    |
    */

    'client_id' => env('DISCORD_CLIENT_ID'),
    'client_secret' => env('DISCORD_CLIENT_SECRET'),
    'redirect_uri' => env('DISCORD_REDIRECT_URI'),
    'oauth2_login_url' => env('DISCORD_OAUTH2_LOGIN_URL')
];