<?php

namespace App\Http\Livewire\Calificaciones;

use Livewire\Component;
use App\Models\Calificaciones;
use App\Models\User;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    protected $puntuaciones;
    public $dificultadTerm = "";
    public $opcionUsuario = "";
    public $usuarios;
    public $mostrarFiltros = false;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        $this->puntuaciones = Calificaciones::orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10);
        $this->usuarios = User::all();
        $this->dispatchBrowserEvent('select2:init');

    }

    public function render()
    {
        if ($this->dificultadTerm !== "") {
            if ($this->opcionUsuario !== "") {
                $this->puntuaciones = Calificaciones::where('dificultad', $this->dificultadTerm)->where('user_id', $this->opcionUsuario)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10)();
            } else {
                $this->puntuaciones = Calificaciones::where('dificultad', $this->dificultadTerm)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10)();
            }
        } else {
            if ($this->opcionUsuario !== "") {
                $this->puntuaciones = Calificaciones::where('user_id', $this->opcionUsuario)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10)();
            } else {
                $this->puntuaciones = Calificaciones::orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10);
            }
        }

        return view('livewire.calificaciones.index', ['calificaciones' => $this->puntuaciones]);
    }

    public function toggleMostrarFiltros()
    {
        $this->mostrarFiltros = !$this->mostrarFiltros;
    }


}