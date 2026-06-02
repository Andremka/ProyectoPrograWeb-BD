<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Objetivo;
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
        ]);

        // Objetivos predefinidos del chatbot
        $objetivos = [
            ['descripcion' => 'Estrategias de marketing digital',   'categoria' => 'marketing'],
            ['descripcion' => 'Gestion de redes sociales',          'categoria' => 'marketing'],
            ['descripcion' => 'Publicidad y campanas pagadas',       'categoria' => 'publicidad'],
            ['descripcion' => 'Diseno de marca y branding',         'categoria' => 'diseno'],
            ['descripcion' => 'Analisis y reportes de resultados',  'categoria' => 'analisis'],
            ['descripcion' => 'Preguntas generales sobre la empresa','categoria' => 'general'],
        ];

        foreach ($objetivos as $obj) {
            Objetivo::create($obj);
        }
    }
}
