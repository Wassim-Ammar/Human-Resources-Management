<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccation>
 */
class VaccationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'type' => fake()->randomElement(['active', 'inactive']),
            'state' => fake()->randomElement(['waiting']),
            'user_id' => User::factory(),
        ];
    }
}
