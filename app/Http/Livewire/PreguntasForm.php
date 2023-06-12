<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PreguntaCustom;
use WithFileUploads;


class PreguntasForm extends Component
{
  
public $preguntaId;
public $paqueteId;
public $pregunta;
public $respuestas_incorrectas = [];
public $respuesta_incorrecta1;
public $respuesta_incorrecta2;
public $respuesta_incorrecta3;
public $dificultad;
public $respuesta_correcta;
public $categoria;
public $preguntasArray = [];


public function mount($paquete = null) {
    $this->paqueteId = $paquete->id;

    if($paquete) {
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

public function cargarPregunta($idPregunta)
{
    $pregunta = PreguntaCustom::find($idPregunta);

    if ($pregunta) {
        $this->preguntaId = $pregunta->id;
        $this->pregunta = $pregunta->pregunta;
        $this->respuesta_correcta = $pregunta->respuesta_correcta;
        $this->respuesta_incorrecta1 = $pregunta->respuestas_incorrectas[0];
        $this->respuesta_incorrecta2 = $pregunta->respuestas_incorrectas[1];
        $this->respuesta_incorrecta3 = $pregunta->respuestas_incorrectas[2];
        $this->categoria = $pregunta->categoria;
        $this->dificultad = $pregunta->dificultad;
    }
}

public function actualizarPregunta()
{
    $datos = $this->manejarDatos();

    // Busca la pregunta por ID en el array y la actualiza
    foreach ($this->preguntasArray as &$pregunta) {
        if ($pregunta['id'] == $this->preguntaId) {
            $pregunta = $datos;
            break;
        }
    }

    $this->limpiarFormulario();
}

public function manejarDatos(){
    foreach ($this->preguntasArray as $preguntaS) {
        if(isset($preguntaS['id'])) {
            // Actualizar
            $pregunta = PreguntaCustom::find($preguntaS['id']);
            $pregunta->update($preguntaS);
        } else {
            // Crear
            $nuevaPregunta = new PreguntaCustom;
            $nuevaPregunta->paquete_pregunta = $this->paqueteId;
            $nuevaPregunta->pregunta = $preguntaS['pregunta'];
            $nuevaPregunta->respuesta_correcta = $preguntaS['respuesta_correcta'];
            $nuevaPregunta->respuestas_incorrectas = json_encode([$preguntaS['respuesta_incorrecta1'], $preguntaS['respuesta_incorrecta2'], $preguntaS['respuesta_incorrecta3']]);
            $nuevaPregunta->categoria = $preguntaS['categoria'];
            $nuevaPregunta->dificultad = $preguntaS['dificultad'];
            $nuevaPregunta->save();
        }
    }

    $this->emit('finalizarSubida');
}

public function eliminarPregunta($idPregunta)
{
    $this->preguntasArray = array_values(array_filter($this->preguntasArray, function($pregunta) use ($idPregunta) {
        return $pregunta['id'] != $idPregunta;
    }));
}


public function guardarPreguntas($id){
    foreach ($this->preguntasArray as $preguntaS) {
        $nuevaPregunta = new PreguntaCustom;
        $nuevaPregunta->paquete_pregunta = $id;
        $nuevaPregunta->pregunta = $preguntaS['pregunta'];
        $nuevaPregunta->respuesta_correcta = $preguntaS['respuesta_correcta'];
        $nuevaPregunta->respuestas_incorrectas = json_encode($preguntaS['respuesta_incorrecta1'], $preguntaS['respuesta_incorrecta2'], $preguntaS['respuesta_incorrecta3']);
        $nuevaPregunta->categoria = $preguntaS['categoria'];
        $nuevaPregunta->dificultad = $preguntaS['dificultad'];
        $nuevaPregunta->dificultad = $preguntaS['dificultad'];
        $nuevaPregunta->save();
    }

    $this->emit('finalizarSubida');

    
}


}