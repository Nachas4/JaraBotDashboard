<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModRole>
 */
class ModRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ban' => fake()->numberBetween(619514971868626973, 711348770104672308),
            'kick' => fake()->numberBetween(619514971868626973, 711348770104672308),
            'timeout' => fake()->numberBetween(619514971868626973, 711348770104672308),
            'quarantine' => fake()->numberBetween(619514971868626973, 711348770104672308)
        ];
    }
}
