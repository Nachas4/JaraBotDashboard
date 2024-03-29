<?php

namespace Database\Seeders;

use App\Models\AccessToken;
use App\Models\DcGuild;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'nachas4',
            'global_name' => 'Nachas4',
            'avatar' => '3b0fdc6d1f3d287ac396006504b967db.png',
            'user_id' => 711348770104672308
        ]);

        User::factory()->create([
            'username' => 'csiszar.',
            'global_name' => 'Klozon',
            'avatar' => 'bc3bee1d104a43269a1e5062d2be5b02.png',
            'user_id' => 619514971868626973
        ]);

        User::factory()->create([
            'username' => 'Gyula#1498',
            'global_name' => 'Gyula',
            'avatar' => 'a871188ffcc050ee86fb6c1852c6ce06.gif',
            'user_id' => 444435951041773568
        ]);

        //Creates 3 users, then creates 3 owned guilds for each of them, and an access token.
        User::factory(3)
            ->has(DcGuild::factory()->count(3), 'owned_guilds')
            ->has(AccessToken::factory()->count(1), 'access_token')
            ->create();
    }
}
