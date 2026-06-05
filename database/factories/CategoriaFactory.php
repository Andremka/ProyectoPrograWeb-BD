<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    public function definition()
    {
        $categorias = [
            ['nombre' => 'Marketing', 'descripcion' => 'Estrategias y acciones de marketing digital'],
            ['nombre' => 'Publicidad', 'descripcion' => 'Campanas publicitarias y medios pagados'],
            ['nombre' => 'Diseno', 'descripcion' => 'Diseno grafico, branding e identidad visual'],
            ['nombre' => 'Analisis', 'descripcion' => 'Analisis de datos y reportes de resultados'],
            ['nombre' => 'General', 'descripcion' => 'Consultas generales sobre la empresa'],
        ];

        $categ = $this->faker->randomElement($categorias);

        return [
            'nombre' => $categ['nombre'],
            'descripcion' => $categ['descripcion'],
        ];
    }
}
