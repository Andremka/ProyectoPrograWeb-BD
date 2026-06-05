<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;

    protected $table = 'objetivos';
    protected $primaryKey = 'id_objetivo';

    protected $fillable = [
        'id_categoria',
        'descripcion',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'id_objetivo', 'id_objetivo');
    }
}
