<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeticionAmistad extends Model
{
    use HasFactory;

    protected $table = "peticion_amistad";
    protected $fillable = [
        'user_id_1',
        'user_id_2',
        'user_1_acepta',
        'user_2_acepta',
    ];
}
