<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $primaryKey = 'id_solicitud';

    protected $fillable = [
        'id_usuario',
        'id_objetivo',
        'session_id',
        'mensaje',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'id_objetivo', 'id_objetivo');
    }

    public function estados()
    {
        return $this->hasMany(EstadoSolicitud::class, 'id_solicitud', 'id_solicitud')->orderBy('fecha_cambio');
    }
}
