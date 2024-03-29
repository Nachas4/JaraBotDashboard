<?php

namespace Database\Factories;

use App\Models\DcGuild;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Moderator>
 */
class ModeratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dc_guild_id' => fake()->randomElement(DcGuild::all('id')),
            'user_id' => fake()->randomElement(User::all('id')),
            'is_admin' => fake()->boolean()
        ];
    }
}
