<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObjetivoFactory extends Factory
{
    public function definition()
    {
        return [
            'id_categoria' => Categoria::inRandomOrder()->first()->id_categoria,
            'descripcion' => $this->faker->sentence(4),
        ];
    }
}
