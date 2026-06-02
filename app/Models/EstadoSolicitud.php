<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSolicitud extends Model
{
    use HasFactory;

    protected $table      = 'estados_solicitudes';
    protected $primaryKey = 'id_estado';

    public $timestamps = false;

    protected $fillable = [
        'id_solicitud',
        'estado',
        'observacion',
    ];

    protected $casts = [
        'fecha_cambio' => 'datetime',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud', 'id_solicitud');
    }
}
