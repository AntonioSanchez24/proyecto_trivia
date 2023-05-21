<?php

namespace App\Http\Livewire\PreguntasOriginales;

use Livewire\Component;
use App\Models\PreguntaOriginal;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    public $pregunta;
    public $respuestas_incorrectas = [];
    public $respuesta_incorrecta1;
    public $respuesta_incorrecta2;
    public $respuesta_incorrecta3;
    public $dificultad;
    public $respuesta_correcta;
    public $categoria;

    public function mount(){
    }

    public function render()
    {
        return view('livewire.preguntas-originales.create');
    }
 public function submit()
    {
        $this->alert('warning', "BOM DIA");
        $this->respuestas_incorrectas = json_encode([$this->respuesta_incorrecta1, $this->respuesta_incorrecta2, $this->respuesta_incorrecta3]);

        // Validación de datos
        $datos = $this->validate([
            'pregunta' => 'required',
            'dificultad' => 'required',
            'respuesta_correcta' => 'required',
            'categoria' => 'required',
            'respuestas_incorrectas' => 'required',
            
        ],
            // Mensajes de error
            [
                'pregunta.required' => 'La pregunta es obligatoria.',
                'respuestas_incorrectas.required' => 'Añade todas las respuestas.',
                'dificultad.required' => 'Selecciona la dificultad de la pregunta.',
                'respuesta_correcta.required' => 'No has indicado cual es la respuesta correcta.',
                'categoria.required' => 'Indica una categoría.',
            ]);
            

        // Guardar datos validados
        $guardarPregunta = PreguntaOriginal::create($datos);

        // Alertas de guardado exitoso
        if ($guardarPregunta) {
            $this->alert('success', '¡Pregunta añadida!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', '¡No se ha podido añadir la pregunta!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
        }
    }

    public function getListeners()
    {
        return [
            'confirmed'
        ];
    }

    public function confirmed()
    {
        return redirect()->route('dashboard');
    }

}
