<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use JavaScript;
use Livewire\Component;
use App\Models\PreguntaOriginal;

class Juego extends Component
{
    public $preguntas;
    public $preguntasJuego;
    public function mount(){
       
    }
    public function render()
    
    {
        $this->preguntas = PreguntaOriginal::limit(15)->get();
        $this->preguntasJuego = PreguntaOriginal::limit(15)->get(); 
        return view('livewire.juego');
    }
}
