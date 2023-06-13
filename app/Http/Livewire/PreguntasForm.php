<?php

namespace App\Http\Livewire;

use App\Models\PaquetePregunta;
use Livewire\Component;
use App\Models\PreguntaCustom;
use WithFileUploads;

class PreguntasForm extends Component
{
    public $preguntaId;
    public $paqueteId;
    public $pregunta;
    public $paquete;
    public $respuestas_incorrectas = [];
    public $respuesta_incorrecta1;
    public $respuesta_incorrecta2;
    public $respuesta_incorrecta3;
    public $dificultad;
    public $respuesta_correcta;
    public $categoria;
    public $preguntasArray = [];

    protected $listeners = ['update' => 'recargarPreguntas'];

    public function mount($id = null)
    {
        if ($id) {
            $this->paqueteId = $id;
            $this->paquete = PaquetePregunta::where('id', $id)->first();
            $this->preguntasArray = PreguntaCustom::where('paquete_pregunta', $this->paqueteId)->get()->toArray();
        }
    }

    public function render()
    {

        return view('livewire.preguntas-form');
    }

    public function cargarPregunta($idPregunta)
    {
        $pregunta = PreguntaCustom::find($idPregunta);
        if ($pregunta) {
            $this->preguntaId = $pregunta->id;
            $this->pregunta = $pregunta->pregunta;
            $this->respuesta_correcta = $pregunta->respuesta_correcta;
            $incorrectas = json_decode($pregunta->respuestas_incorrectas, true);
            $this->respuesta_incorrecta1 = $incorrectas[0];
            $this->respuesta_incorrecta2 = $incorrectas[1];
            $this->respuesta_incorrecta3 = $incorrectas[2];
            $this->categoria = $pregunta->categoria;
            $this->dificultad = $pregunta->dificultad;
        }
    }

    public function actualizarPregunta()
    {
        $pregunta = PreguntaCustom::find($this->preguntaId);
        if ($pregunta) {
            $pregunta->pregunta = $this->pregunta;
            $pregunta->respuesta_correcta = $this->respuesta_correcta;
            $pregunta->respuestas_incorrectas = json_encode([
                $this->respuesta_incorrecta1,
                $this->respuesta_incorrecta2,
                $this->respuesta_incorrecta3
            ]);
            $pregunta->categoria = $this->categoria;
            $pregunta->dificultad = $this->dificultad;
            $pregunta->save();
        }
        $this->limpiarFormulario();
        $this->emit("update");

    }

    public function eliminarPregunta($idPregunta)
    {
        $pregunta = PreguntaCustom::find($idPregunta);
        if ($pregunta) {
            $pregunta->delete();
        }

        $this->emit("update");

    }

    public function guardarPregunta()
    {
        $nuevaPregunta = new PreguntaCustom;
        $nuevaPregunta->paquete_pregunta = $this->paqueteId;
        $nuevaPregunta->pregunta = $this->pregunta;
        $nuevaPregunta->respuesta_correcta = $this->respuesta_correcta;
        $nuevaPregunta->respuestas_incorrectas = json_encode([
            $this->respuesta_incorrecta1,
            $this->respuesta_incorrecta2,
            $this->respuesta_incorrecta3
        ]);
        $nuevaPregunta->categoria = $this->categoria;
        $nuevaPregunta->dificultad = $this->dificultad;
        $nuevaPregunta->save();
        $this->limpiarFormulario();
        $this->emit("update");

    }

    private function limpiarFormulario()
    {
        $this->reset(['pregunta', 'respuesta_correcta', 'respuesta_incorrecta1', 'respuesta_incorrecta2', 'respuesta_incorrecta3', 'categoria', 'dificultad']);
    }

    public function recargarPreguntas() {
        $this->preguntasArray = []; // Limpia el array existente
        // Recargar preguntas del paquete
        if($this->paqueteId) {
            $preguntas = PreguntaCustom::where('paquete_pregunta', $this->paqueteId)->get();
    
            foreach ($preguntas as $pregunta) {
                $incorrectas = json_decode($pregunta->respuestas_incorrectas, true);
                $this->preguntasArray[] = [
                    'id' => $pregunta->id,
                    'pregunta' => $pregunta->pregunta,
                    'respuesta_correcta' => $pregunta->respuesta_correcta,
                    'respuestas_incorrectas' => [$incorrectas[0], $incorrectas[1], $incorrectas[2]],
                    'categoria' => $pregunta->categoria,
                    'dificultad' => $pregunta->dificultad,
                ];
            }
        }
    }
    

}