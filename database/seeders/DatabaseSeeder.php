<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Objetivo;
use App\Models\Solicitud;
use App\Models\EstadoSolicitud;
use App\Models\Contacto;
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

        // usuarios adicionales 
        User::factory(9)->create();

        // Objetivos predefinidos
        $objetivos = [
            ['descripcion' => 'Estrategias de marketing digital',    'categoria' => 'marketing'],
            ['descripcion' => 'Gestion de redes sociales',           'categoria' => 'marketing'],
            ['descripcion' => 'Publicidad y campanas pagadas',        'categoria' => 'publicidad'],
            ['descripcion' => 'Diseno de marca y branding',          'categoria' => 'diseno'],
            ['descripcion' => 'Analisis y reportes de resultados',   'categoria' => 'analisis'],
            ['descripcion' => 'Preguntas generales sobre la empresa', 'categoria' => 'general'],
        ];

        foreach ($objetivos as $obj) {
            Objetivo::create($obj);
        }

        // objetivos 
        Objetivo::factory(4)->create();

        // solicitudes 
        Solicitud::factory(10)->create();

        // estados de solicitudes 
        EstadoSolicitud::factory(10)->create();

        // contactos 
        Contacto::factory(10)->create();
    }
}
