<?php

namespace App\Http\Livewire\CreadorPreguntas;

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

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        $this->paquete_preguntas = PaquetePregunta::where('user_id', Auth::id())->get();

    }

    public function render()
    {
        if ($this->search !== "") {
            $paquetePreguntas = PaquetePregunta::where('user_id', Auth::id())->where('nombre', $this->search)->paginate(10);
        } else {
            $paquetePreguntas = PaquetePregunta::where('user_id', Auth::id())->paginate(10);
        }

        return view('livewire.creador-preguntas.index', ['paquetePreguntas' => $paquetePreguntas]);
    }

}