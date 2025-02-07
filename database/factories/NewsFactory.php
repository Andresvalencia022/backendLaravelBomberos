<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_news' => fake()->name(),
            'info' => fake()->text(),
            'name_imagen' => fake()->name(),
            'video_name' => fake()->name(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
