<?php

namespace Database\Factories;

use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoSolicitudFactory extends Factory
{
    public function definition()
    {
        $observaciones = [
            'Solicitud recibida y en revision',
            'Se asigno un agente para atender la solicitud',
            'El cliente confirmo la informacion requerida',
            'Solicitud completada satisfactoriamente',
            'Se requiere informacion adicional del cliente',
            'En espera de aprobacion interna',
            'Solicitud cerrada por inactividad',
        ];

        return [
            'id_solicitud' => Solicitud::inRandomOrder()->first()->id_solicitud,
            'estado'       => $this->faker->randomElement(['pendiente', 'activa', 'cerrada']),
            'observacion'  => $this->faker->randomElement($observaciones),
        ];
    }
}
