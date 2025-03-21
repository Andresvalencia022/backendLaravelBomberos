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
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Andres Felipe',
            'last_name' => 'Valencia Cano',
            'phone' => fake()->phoneNumber('+5734567890'),
            // 'email' => fake()->unique()->safeEmail(),
            'email' => 'andresfv2016@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'post' => 'admin',
            'state' => fake()->randomElement([0, 1]),
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
