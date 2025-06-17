<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
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
            'fname'             => fake()->firstName,
            'lname'             => fake()->lastName,
            'email'             => fake()->unique()->email,
            'contact_number'    => fake()->phoneNumber,
            'gender'            => fake()->randomElement(['Male', 'Female']),
            'birtdate'          => fake()->date('Y-m-d', 'now'),
            'complete_address'  => fake()->address,
            'bio'               => fake()->sentence,

        ];
    }
}
