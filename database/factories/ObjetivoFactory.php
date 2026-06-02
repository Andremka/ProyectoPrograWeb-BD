<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ObjetivoFactory extends Factory
{
    public function definition()
    {
        $categorias = ['marketing', 'publicidad', 'diseno', 'analisis', 'general'];

        return [
            'descripcion' => $this->faker->sentence(4),
            'categoria'   => $this->faker->randomElement($categorias),
        ];
    }
}
