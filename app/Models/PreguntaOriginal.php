<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaOriginal extends Model
{
    protected $table = "pregunta_original";
    protected $fillable = [
        'pregunta',
        'respuesta_correcta',
        'respuestas_incorrectas',
        'categoria',
        'dificultad',
    ];

}
