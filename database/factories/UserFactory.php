<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre'   => $this->faker->firstName(),
            'paterno'  => $this->faker->lastName(),
            'materno'  => $this->faker->lastName(),
            'email'    => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password123'),
        ];
    }
}
