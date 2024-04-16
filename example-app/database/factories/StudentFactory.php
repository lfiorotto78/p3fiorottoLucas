<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => fake()->randomNumber(8),
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'birthdate' => fake()->date(),
            'group' => fake()->randomElement(['A', 'B']),
        ];
    }
}
