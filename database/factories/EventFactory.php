<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => fake()->name(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'time' => fake()->time(),
            'description' => fake()->text(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
