<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calificaciones;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function mostrarPerfil($username)
    {

        $usuario = $username;


        return view('perfil.mostrar', ['usuario' => $usuario]);
    }
}
