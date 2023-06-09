<?php

namespace App\Http\Livewire\Calificaciones;

use Livewire\Component;
use App\Models\Calificaciones;
use App\Models\User;

class Index extends Component
{
    public $calificaciones;
    public $dificultadTerm = "";
    public $opcionUsuario = "";
    public $usuarios;
    public $mostrarFiltros = false;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        $this->calificaciones = Calificaciones::orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();
        $this->usuarios = User::all();
        $this->dispatchBrowserEvent('select2:init');

    }

    public function render()
    {
        if ($this->dificultadTerm !== "") {
            if ($this->opcionUsuario !== "") {
                $this->calificaciones = Calificaciones::where('dificultad', $this->dificultadTerm)->where('user_id', $this->opcionUsuario)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();
            } else {
                $this->calificaciones = Calificaciones::where('dificultad', $this->dificultadTerm)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();
            }
        } else {
            if ($this->opcionUsuario !== "") {
                $this->calificaciones = Calificaciones::where('user_id', $this->opcionUsuario)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();
            } else {
                $this->calificaciones = Calificaciones::orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->get();
            }
        }

        return view('livewire.calificaciones.index');
    }

    public function toggleMostrarFiltros()
    {
        $this->mostrarFiltros = !$this->mostrarFiltros;
    }


}