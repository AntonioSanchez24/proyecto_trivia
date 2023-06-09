<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaCustom extends Model
{
    use HasFactory;
    protected $table = "pregunta_custom";
    protected $fillable = [
        'paquete_pregunta',
        'pregunta',
        'respuesta_correcta',
        'respuestas_incorrectas',
        'categoria',
        'dificultad',
    ];

}