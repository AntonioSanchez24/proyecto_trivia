<?php

namespace App\Http\Livewire\CreadorPreguntas;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\PaquetePregunta;
use App\Models\PreguntaCustom;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $nombre;
    public $categoria;
    public $description;
    public $photo_url;
    public $photo;
    public $paqueteId;
    public $paquete;
    protected $listeners = ['finalizarSubida' => 'finalizarSubida'];

    public function mount($id) {
        $this->paquete = PaquetePregunta::find($id);
        $this->nombre = $this->paquete->nombre;
        $this->categoria = $this->paquete->categoria;
        $this->description = $this->paquete->description;
        $this->photo_url = $this->paquete->photo_url;
        $this->paqueteId = $this->paquete->id;
    }

    public function render()
    {
        return view('livewire.creador-preguntas.edit');
    }

    public function actualizarTodo()
    {
        $datos = $this->validate(
            [
                'nombre' => 'required|string|max:255',
                'categoria' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'nombre.required' => 'El nombre es necesario.',
                'nombre.string' => 'El nombre debe ser una cadena de texto.',
                'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
                'categoria.required' => 'La categoría es necesaria.',
                'categoria.string' => 'La categoría debe ser una cadena de texto.',
                'categoria.max' => 'La categoría no puede exceder los 255 caracteres.',
                'description.required' => 'La descripción es necesaria.',
                'description.string' => 'La descripción debe ser una cadena de texto.',
                'description.max' => 'La descripción no puede exceder los 1000 caracteres.',
                'photo.required' => 'La foto es necesaria.',
                'photo.image' => 'La foto debe ser una imagen.',
                'photo.mimes' => 'La foto debe ser de un formato válido: jpeg, png, jpg, gif, svg.',
                'photo.max' => 'La foto no puede exceder los 2048kb.',
            ]
        );

        if($this->photo){
            $imageName = $this->photo->storePublicly('photos', 'public');
            $this->photo_url = 'storage/' . $imageName;
            $datos['photo_url'] = $this->photo_url;
        }

        $paquete = PaquetePregunta::find($this->paqueteId);
        $paquete->update($datos);

        $this->emit('actualizarPreguntas', $paquete->id);
    }

    public function finalizarSubida()
    {
        $this->alert('success', '¡Tu paquete se ha actualizado!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Volviendo a la lista de paquetes....',
            'confirmButtonText' => 'OK',
            'cancelButtonText' => 'Cancelar',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);

        return redirect()->route('creadorPreguntas.index');
    }
}
