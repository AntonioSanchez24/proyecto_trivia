<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use JavaScript;
use Livewire\Component;
use App\Models\PreguntaOriginal;

class Juego extends Component
{
    public $pregunta;
    public $preguntaSalto;

    public $preguntasJuego;
    public $preguntasYaAparecidas = [];


    protected $listeners = ['nuevaPregunta' => 'recogerPregunta'];

    public function mount(){
        $this->pregunta = PreguntaOriginal::where('dificultad', 1)->inRandomOrder()->first();
        $this->preguntaSalto = PreguntaOriginal::where('dificultad', 1)->inRandomOrder()->first();
       
    }
    public function render()
    
    {
        $this->preguntasJuego = PreguntaOriginal::all(); 
        return view('livewire.juego');
    }

    public function recogerPregunta($dificultad)
    {
        if(!isset($this->preguntasYaAparecidas[0])){
            $this->preguntasYaAparecidas[0] = $this->pregunta->id;
        }

        while(in_array($this->pregunta->id, $this->preguntasYaAparecidas)){
            $this->pregunta = PreguntaOriginal::where('dificultad', $dificultad)->inRandomOrder()->first();
        }

        $this->preguntasYaAparecidas[] = $this->pregunta->id;

        $this->emit('preguntaRecogida', $this->pregunta);

    }


}
