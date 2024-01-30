<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DcGuild>
 */
class DcGuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'guild_id' => fake()->numberBetween(321845546534830085, 86004744966914048),
            'name' => fake()->monthName(),
            'icon' => '' . Str::random(20) . '.png',
            'owner_id' => fake()->numberBetween(1, 3)
        ];
    }
}
