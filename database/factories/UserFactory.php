<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(619514971868626973, 711348770104672308),
            'username' => fake()->userName(),
            'global_name' => fake()->name(),
            'avatar' => Str::random(20),
            'banner_color' => fake()->hexColor(),
            'mfa_enabled' => fake()->boolean(),
        ];
    }
}
