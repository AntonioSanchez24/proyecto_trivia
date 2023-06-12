<?php

namespace App\Http\Livewire\JuegoPersonalizado;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Calificaciones;
use App\Models\PaquetePregunta;
use App\Models\User;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $paquete_preguntas;
    public $search = "";
    public $suscripciones;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        $this->paquete_preguntas = PaquetePregunta::all();
        $this->suscripciones = json_decode(Auth::user()->suscripciones, true);

    }

    public function render()
    {
        if ($this->search !== "") {
            $paquetePreguntas = PaquetePregunta::where('nombre', $this->search)->paginate(10);
        } else {
            $paquetePreguntas = PaquetePregunta::paginate(10);
        }

        return view('livewire.juego-personalizado.index', ['paquetePreguntas' => $paquetePreguntas]);
    }

    public function suscribirse($id)
    {
        $usuario = Auth::user();

        // Asegurándose de que "suscripciones" siempre sea un array
        $suscripciones = $usuario->suscripciones ? json_decode($usuario->suscripciones, true) : [];

        // Agregar el nuevo ID a la lista de suscripciones
        $suscripciones[] = $id;

        // Codificar la lista de suscripciones a JSON y guardarla en el usuario
        $usuario->suscripciones = json_encode($suscripciones);

        // Persistir los cambios en la base de datos
        $usuario->save();

        $this->suscripciones = json_decode(Auth::user()->suscripciones, true);

    }

    public function desuscribirse($id)
    {
        $usuario = Auth::user();

        // Asegurándose de que "suscripciones" siempre sea un array
        $suscripciones = $usuario->suscripciones ? json_decode($usuario->suscripciones, true) : [];

        // Buscar la posición del ID en la lista de suscripciones
        $key = array_search($id, $suscripciones);

        // Si el ID está en la lista de suscripciones, eliminarlo
        if ($key !== false) {
            unset($suscripciones[$key]);
        }

        // Codificar la lista de suscripciones a JSON y guardarla en el usuario
        $usuario->suscripciones = json_encode($suscripciones);

        // Persistir los cambios en la base de datos
        $usuario->save();

        $this->suscripciones = json_decode(Auth::user()->suscripciones, true);
        

    }

}