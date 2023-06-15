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
        if ($listaAmigos != null) {
            if (in_array($this->usuario->id, $listaAmigos)) {
                $this->estado = "aceptado";
            }
        }

        $this->calificaciones = Calificaciones::where('user_id', $this->usuario->id)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();

        $solicitud = Auth::user()->solicitudesAmistadPendientes()->where('user_id', $this->usuario->id)->first();
        if ($solicitud) {
            if ($solicitud->pivot->estado == 'pendiente') {
                $this->estado = 'pendiente';
            }
        }
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
        $numeroEliminar = 0;
        $numeroEliminar2 = 0;
        $miLista = json_decode(Auth::user()->amigos, true);
        $tuLista = json_decode($this->usuario->amigos, true);

        foreach ($tuLista as $amigoIndex => $amigo) {
            if ($amigo == Auth::id()) {
                $numeroEliminar = $amigoIndex;
                break;
            }
        }

        foreach ($miLista as $amigoIndex => $amigo) {
            if ($amigo == $this->usuario->id) {
                $numeroEliminar2 = $amigoIndex;
                break;
            }
        }
        array_splice($tuLista, $numeroEliminar, 1);
        array_splice($miLista, $numeroEliminar2, 1);

        Auth::user()->amigos = json_encode($miLista);
        $this->usuario->amigos = json_encode($tuLista);

        Auth::user()->save();
        $this->usuario->save();

        $this->estado = null;
    }
}
