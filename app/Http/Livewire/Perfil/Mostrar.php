<?php

namespace App\Http\Livewire\Perfil;

use App\Models\Calificaciones;
use App\Models\PeticionAmistad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mostrar extends Component
{
    public $usuario;
    public $calificaciones;
    public $estado;


    public function mount($usuario)
    {
        $listaAmigos = json_decode(Auth::user()->amigos, true);
        $this->usuario = User::where('name', $usuario)->first();
        if(in_array($this->usuario->id, $listaAmigos)){
            $this->estado = "aceptado";
        }
        $this->calificaciones = Calificaciones::where('user_id', $this->usuario->id)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();

    }

    public function render()
    {

        return view('livewire.perfil.mostrar');
    }

    public function sendFriendRequest()
    {
        auth()->user()->amigos()->attach($this->usuario->id, ['estado' => 'pendiente']);
        $this->estado = "pendiente";
    }

    public function removeFriend()
    {
        auth()->user()->removeFriend($this->usuario);
        $this->estado = null;
    }

}