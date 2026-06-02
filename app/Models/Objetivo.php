<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;

    protected $table      = 'objetivos';
    protected $primaryKey = 'id_objetivo';

    protected $fillable = [
        'descripcion',
        'categoria',
    ];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'id_objetivo', 'id_objetivo');
    }
}
