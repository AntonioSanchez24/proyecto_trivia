<?php

namespace App\Http\Livewire\Calificaciones;

use Livewire\Component;
use App\Models\Calificaciones;
use App\Models\User;

class Index extends Component
{
    public $calificaciones;
    public $usuario;

    public function mount(){
        $this->calificaciones = Calificaciones::orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();
        $this->usuario = User::all();
    }

    public function render()
    {
        return view('livewire.calificaciones.index');
    }
}
