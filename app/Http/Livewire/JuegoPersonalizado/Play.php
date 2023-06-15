<?php

namespace App\Http\Livewire\JuegoPersonalizado;

use App\Models\PreguntaCustom;
use Livewire\Component;

class Play extends Component
{
    public $pregunta;
    public $preguntaSalto;

    public $paquete;

    protected $listeners = ['nuevaPregunta' => 'recogerPregunta'];


    public function mount($id)
    {
        $this->paquete = $id;
        $this->pregunta = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 1)->inRandomOrder()->first();
        $this->preguntaSalto = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 1)->inRandomOrder()->first();
    }
    public function render()
    {
        return view('livewire.juego-personalizado.play');
    }


    public function recogerPregunta($dificultad)
    {
        if (count(PreguntaCustom::where('paquete_pregunta', $this->paquete)->get()) < 15) {
            $preguntas = collect();

            while ($preguntas->count() < 15) {
                $pregunta = PreguntaCustom::where('paquete_pregunta', $this->paquete)
                    ->where('dificultad', 1)
                    ->inRandomOrder()
                    ->first();

                $preguntas->push($pregunta);
            }

            $this->pregunta = $preguntas;
        } else {
            if ($dificultad == 1) {
                $pre1 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 1)->inRandomOrder()->limit(7)->get();
                $pre2 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 2)->inRandomOrder()->limit(5)->get();
                $pre3 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 3)->inRandomOrder()->limit(3)->get();
                $this->pregunta = $pre1->merge($pre2)->merge($pre3);
            } else if ($dificultad == 2) {
                $pre1 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 1)->inRandomOrder()->limit(5)->get();
                $pre2 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 2)->inRandomOrder()->limit(5)->get();
                $pre3 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 3)->inRandomOrder()->limit(5)->get();
                $this->pregunta = $pre1->merge($pre2)->merge($pre3);
            } else {
                $pre1 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 1)->inRandomOrder()->limit(3)->get();
                $pre2 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 2)->inRandomOrder()->limit(5)->get();
                $pre3 = PreguntaCustom::where('paquete_pregunta', $this->paquete)->where('dificultad', 3)->inRandomOrder()->limit(7)->get();
                $this->pregunta = $pre1->merge($pre2)->merge($pre3);
            }
        }


        $this->emit('preguntaRecogida', $this->pregunta);
    }
}
