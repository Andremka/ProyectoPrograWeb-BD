<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    public function definition()
    {
        $nombres = [
            'Marketing', 'Publicidad', 'Diseno',
            'Analisis', 'General', 'Redes Sociales',
            'Branding', 'SEO'
        ];

        return [
            'nombre' => $this->faker->randomElement($nombres),
        ];
    }
}
