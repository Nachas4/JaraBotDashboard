<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServerSetting>
 */
class ServerSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'auto_responses_enabled' => fake()->boolean(),
            'auto_messages_enabled' => fake()->boolean(),
            'quotes_enabled' => fake()->boolean(),
            'welcome_messages_enabled' => fake()->boolean(),
            'mod_message_channels_enabled' => fake()->boolean(),
            'mod_roles_enabled' => fake()->boolean(),
            'moderators_enabled' => fake()->boolean(),
            'blacklist_enabled' => fake()->boolean()
        ];
    }
}
