<?php

namespace App\Http\Livewire\CreadorPreguntas;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\PaquetePregunta;
use App\Models\PreguntaCustom;
use Livewire\WithFileUploads;



class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $nombre;
    public $categoria;
    public $description;
    public $photo_url;
    public $photo;

    protected $listeners = ['finalizarSubida' => 'finalizarSubida'];


    public function render()
    {
        return view('livewire.creador-preguntas.create');
    }

    public function guardarTodo()
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

        $imageName = $this->photo->storePublicly('photos', 'public');

        $this->photo_url = asset('storage/' . $imageName);

        $datos['photo_url'] = $this->photo_url;
        $datos['user_id'] = Auth::id();

        $paquete = PaquetePregunta::create($datos);
        $paqueteSave = $paquete->save();

        $this->emit('guardarPreguntas', $paquete->id);
    }

    public function finalizarSubida()
    {

        $this->alert('success', '¡Tu paquete se ha subido!', [
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