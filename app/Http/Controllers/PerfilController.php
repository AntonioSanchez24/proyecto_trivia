<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calificaciones;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function mostrarPerfil($username)
    {

        $usuario = User::where('name', $username)->first();
        $calificaciones = Calificaciones::where('user_id', $usuario->id)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();


        return view('perfil.mostrar', ['usuario' => $usuario, 'calificaciones' => $calificaciones]);
    }
}
