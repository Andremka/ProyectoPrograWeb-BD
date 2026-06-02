<?php

namespace Database\Factories;

use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoSolicitudFactory extends Factory
{
    public function definition()
    {
        return [
            'id_solicitud' => Solicitud::inRandomOrder()->first()->id_solicitud,
            'estado'       => $this->faker->randomElement(['pendiente', 'activa', 'cerrada']),
            'observacion'  => $this->faker->sentence(),
        ];
    }
}
