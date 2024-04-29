<?php

namespace Database\Seeders;

use App\Models\AccessToken;
use App\Models\AutoResponse;
use App\Models\AutoRole;
use App\Models\Blacklist;
use App\Models\DcGuild;
use App\Models\Moderator;
use App\Models\ModMessageChannel;
use App\Models\PickupLine;
use App\Models\Quote;
use App\Models\ServerSetting;
use App\Models\User;
use App\Models\WelcomeMessage;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(3)
            ->has(
                DcGuild::factory()->count(3)
                    ->has(AutoResponse::factory()->count(3))
                    ->has(Quote::factory()->count(3))
                    ->has(WelcomeMessage::factory())
                    ->has(ModMessageChannel::factory())
                    ->has(Moderator::factory()->count(3))
                    ->has(ServerSetting::factory())
                    ->has(Blacklist::factory()->count(3))
                    ->has(AutoRole::factory()->count(3))
                    ->has(PickupLine::factory()->count(3)),
                'owned_guilds'
            )
            ->has(AccessToken::factory()->count(1), 'access_token')
            ->create();

        // Moderator::factory()->create();
    }
}
