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
            'fname'     => 'Ryan',
            'lname'     => 'Galang',
            'email'     => 'ryangalang@gmail.com',
            'contact_number'     => '09456840067',
            'gender'     => 'Male',
            'birtdate'     => '2002-08-24',
            'complete_address'     => 'Binmaley',
            'bio'     => 'bio ko',

        ];
    }
}
