<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## TO DO after first clone/pull

Some stuff needs to be done first to run it, because a large chunk of the project is not copied to GitHub.

- Go to `composer.json` and press `Install` on the top of the code
- Run `npm i` so `npm run dev` can function
- Create own `.env` file from `.env.example`
    - Set `APP_NAME` to `Jara Bot Dashboard`
    - Set `DB_DATABASE` to `jarabot` (will also help if you create the db)
- Run `php artisan migrate:fresh --seed`

You also will need to set these `.env` variables for Discord OAuth2 and the dashboard to work:

- `DISCORD_CLIENT_ID`=''
- `DISCORD_CLIENT_SECRET`=''
- `DISCORD_REDIRECT_URI`=''
- `DISCORD_OAUTH2_LOGIN_URL`=''
- `DISCORD_BOT_TOKEN`=''

Ask in dev discord for details on these.