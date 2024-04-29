<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WinningTicket>
 */
class WinningTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'winning_number' => fake()->randomNumber(1,200),
            'description' => fake()->text(),
            'winning_name' => fake()->name(),
            'game_date' => fake()->date(),
        ];
    }
}
