<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre'  => $this->faker->name(),
            'email'   => $this->faker->unique()->safeEmail(),
            'mensaje' => $this->faker->paragraph(),
        ];
    }
}
