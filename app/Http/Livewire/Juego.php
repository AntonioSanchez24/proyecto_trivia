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
        if($dificultad == 1){
            $pre1 = PreguntaOriginal::where('dificultad', 1)->inRandomOrder()->limit(7)->get();
            $pre2 = PreguntaOriginal::where('dificultad', 2)->inRandomOrder()->limit(5)->get();
            $pre3 = PreguntaOriginal::where('dificultad', 3)->inRandomOrder()->limit(3)->get();
            $this->pregunta = $pre1->merge($pre2)->merge($pre3);

        } else if($dificultad == 2){
            $pre1 = PreguntaOriginal::where('dificultad', 1)->inRandomOrder()->limit(5)->get();
            $pre2 = PreguntaOriginal::where('dificultad', 2)->inRandomOrder()->limit(5)->get();
            $pre3 = PreguntaOriginal::where('dificultad', 3)->inRandomOrder()->limit(5)->get();
            $this->pregunta = $pre1->merge($pre2)->merge($pre3);

        }else{
            $pre1 = PreguntaOriginal::where('dificultad', 1)->inRandomOrder()->limit(3)->get();
            $pre2 = PreguntaOriginal::where('dificultad', 2)->inRandomOrder()->limit(5)->get();
            $pre3 = PreguntaOriginal::where('dificultad', 3)->inRandomOrder()->limit(7)->get();
            $this->pregunta = $pre1->merge($pre2)->merge($pre3);
        }

        $this->emit('preguntaRecogida', $this->pregunta);

    }


}
