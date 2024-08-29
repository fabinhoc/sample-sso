<?php

namespace Database\Factories;

use App\Enums\ApplicationStatus;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $url = fake()->url;
        return [
            'name' => fake()->company,
            'url' => $url,
            'callback_url' => $url . '/auth/callback',
            'status' => ApplicationStatus::ACTIVE,
            'client_id' => null,
            'client_secret' => null,
            'tenant_id' => Tenant::factory()->create()->id,
        ];
    }
}
