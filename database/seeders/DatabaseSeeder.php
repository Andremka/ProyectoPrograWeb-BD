<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Objetivo;
use App\Models\Solicitud;
use App\Models\EstadoSolicitud;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Usuario administrador inicial
        User::create([
            'nombre'   => 'Admin',
            'paterno'  => 'Rocket',
            'materno'  => null,
            'email'    => 'admin@rocket.com',
            'password' => Hash::make('admin123'),
            'rol'      => 1, 
        ]);

        // usuarios adicionales 
        User::factory(9)->create();

        // Categorias predefinidas
        $categorias = [
            ['nombre' => 'Marketing'],
            ['nombre' => 'Publicidad'],
            ['nombre' => 'Diseno'],
            ['nombre' => 'Analisis'],
            ['nombre' => 'General'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }
        // 5 categorias adicionales con factory
        Categoria::factory(5)->create();

        // Objetivos predefinidos
        $objetivos = [
            ['id_categoria' => 1, 'descripcion' => 'Estrategias de marketing digital'],
            ['id_categoria' => 1, 'descripcion' => 'Gestion de redes sociales'],
            ['id_categoria' => 2, 'descripcion' => 'Publicidad y campanas pagadas'],
            ['id_categoria' => 3, 'descripcion' => 'Diseno de marca y branding'],
            ['id_categoria' => 4, 'descripcion' => 'Analisis y reportes de resultados'],
            ['id_categoria' => 5, 'descripcion' => 'Preguntas generales sobre la empresa'],
        ];

        foreach ($objetivos as $obj) {
            Objetivo::create($obj);
        }
        // 4 objetivos adicionales con factory
        Objetivo::factory(4)->create();

        // solicitudes 
        Solicitud::factory(10)->create();

        // estados de solicitudes 
        EstadoSolicitud::factory(10)->create();

    }
}
