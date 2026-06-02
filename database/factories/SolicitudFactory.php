<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Objetivo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudFactory extends Factory
{

    public function definition()
    {
        return [
            'id_usuario'  => User::inRandomOrder()->first()->id_usuario,
            'id_objetivo' => Objetivo::inRandomOrder()->first()->id_objetivo,
            'session_id'  => $this->faker->uuid(),
            'mensaje'     => $this->faker->paragraph(),
        ];
    }
}
