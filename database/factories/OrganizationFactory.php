<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->uuid(),
            'api_secret' => Random::generate(64),
            'webhook_url' => fake()->url(),
            'webhook_secret' => Random::generate(24),
            'is_active' => fake()->boolean(80)
        ];
    }
}
