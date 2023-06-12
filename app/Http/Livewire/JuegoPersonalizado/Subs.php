<?php

namespace App\Http\Livewire\JuegoPersonalizado;

use App\Models\PaquetePregunta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Subs extends Component
{
    use WithPagination;

    public $paquetePreguntas;

    public $suscripciones;

    public function mount(){
        $this->paquetePreguntas = PaquetePregunta::all();
        $this->suscripciones = json_decode(Auth::user()->suscripciones, true);
    }
    public function render()
    {
        return view('livewire.juego-personalizado.subs');
    }

    
}
