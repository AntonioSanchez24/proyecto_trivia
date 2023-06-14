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
    }

    public function render()
    {
        $calificar = this.cambiar();
        return view('livewire.calificaciones.index', ['calificaciones' => $calificar]);
    }

    public function cambiar()
    {
        if ($this->dificultadTerm !== "") {
            if ($this->opcionUsuario !== "") {
                return Calificaciones::where('dificultad', $this->dificultadTerm)->where('user_id', $this->opcionUsuario)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10);
            } else {
                return Calificaciones::where('dificultad', $this->dificultadTerm)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10);
            }
        } else {
            if ($this->opcionUsuario !== "") {
                return Calificaciones::where('user_id', $this->opcionUsuario)->orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10);
            } else {
                return Calificaciones::orderBy('puntuacion', 'DESC')->orderBy('dificultad', 'DESC')->orderBy('tiempo', 'DESC')->paginate(10);
            }
        }
    }

}