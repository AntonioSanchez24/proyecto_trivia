<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaquetePregunta extends Model
{
    use HasFactory;

    protected $table = "paquete_preguntas";
    protected $fillable = [
        'nombre',
        'description',
        'photo_url',
        'respuestas_incorrectas',
        'categoria',
        'user_id',
        'dificultad',
    ];
}
