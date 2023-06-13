<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>



        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow-md p-4 flex items-start mb-4">
                    <div class="mr-6">
                        <img src="{{ $paquete->photo_url }}" alt="{{ $paquete->nombre }}"
                            class="w-20 h-20 rounded-full mr-4"> &nbsp;
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $paquete->nombre }}</h2>
                        <p class="text-gray-600 mb-4">{{ $paquete->descripcion }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border border-black border-solid border-2 rounded-lg shadow-lg bg-white">
                            <h2 class="block text-gray-700 text-lg font-medium mb-2">
                                Añade/Modifica una pregunta
                            </h2>

                            <form wire:submit.prevent="" method="POST">
                                <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
                                <div>
                                    <x-label for="pregunta" value="{{ __('Pregunta') }}" />
                                    <input id="pregunta"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="text" name="pregunta" wire:model="pregunta"
                                        placeholder="¿Qué fue antes..?" />
                                    @error('pregunta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <x-label for="respuesta_correcta" value="{{ __('Respuesta correcta') }}" />
                                    <input id="respuesta_correcta"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="text" name="respuesta_correcta" wire:model="respuesta_correcta"
                                        placeholder="¡La gallina!" />
                                    @error('respuesta_correcta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <x-label for="respuesta_incorrecta1" value="{{ __('Respuestas incorrectas') }}" />
                                    <input id="respuesta_incorrecta1"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="text" name="respuesta_incorrecta1" wire:model="respuesta_incorrecta1"
                                        placeholder="Eso de ahí." />
                                    @error('respuesta_incorrecta1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input id="respuesta_incorrecta2"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="text" name="respuesta_incorrecta2" wire:model="respuesta_incorrecta2"
                                        placeholder="Pasapalabra." />
                                    @error('respuesta_incorrecta2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input id="respuesta_incorrecta3"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        type="text" name="respuesta_incorrecta3" wire:model="respuesta_incorrecta3"
                                        placeholder="Un huevo." />
                                    @error('respuesta_incorrecta3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-start mt-4">
                                    <x-label for="categoria" value="{{ __('Categoría') }}" style="margin-left:20px;" />
                                    <input id="categoria"
                                        class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        wire:model="categoria" type="text" name="categoria" placeholder="Eso de ahí."
                                        style="margin-left:5px;" />
                                    @error('respuesta_correcta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <x-label for="dificultad" value="{{ __('Dificultad') }}"
                                        style="margin-left:20px;" />
                                    <input id="dificultad"
                                        class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        wire:model="dificultad" type="number" name="dificultad"
                                        placeholder="Eso de ahí." style="margin-left:5px;" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if ($preguntaId)
                                        <button type="button" wire:click="actualizarPregunta()"
                                            class="ml-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Actualizar
                                        </button>
                                    @else
                                        <button type="button" wire:click="manejarDatos()"
                                            class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Añadir
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="p-6 border border-black border-solid border-2 rounded-lg shadow-lg bg-white">
                            <h2 class="block text-gray-700 text-lg font-medium mb-2">
                                Preguntas añadidas
                            </h2>
                            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                @foreach ($preguntasArray as $preguntaIndex => $pregunta)
                                    <div wire:key='pregunta{{ $preguntaIndex }}'
                                        class="border p-4 mb-4 rounded-md shadow-sm bg-gray-50">
                                        <h1 class="text-2xl mb-2 font-semibold text-gray-700">Pregunta:
                                            {{ $pregunta['pregunta'] }}</h1>
                                        <h2 class="text-xl font-medium text-gray-600">Respuesta correcta:</h2>
                                        <p class="ml-2 text-gray-700"> {{ $pregunta['respuesta_correcta'] }}</p>
                                        <h2 class="text-xl font-medium text-gray-600">Respuestas incorrectas:</h2>
                                        <p class="ml-2 text-gray-700">
                                            @foreach ($pregunta['respuestas_incorrectas'] as $respuesta_incorrecta)
                                                {{ $respuesta_incorrecta }},
                                            @endforeach
                                        </p>
                                        <h2 class="text-xl font-medium text-gray-600">Categoria: </h2>
                                        <p class="ml-2 text-gray-700"> {{ $pregunta['categoria'] }}</p>
                                        <h2 class="text-xl font-medium text-gray-600">Dificultad: </h2>
                                        <p class="ml-2 text-gray-700 mb-4"> {{ $pregunta['dificultad'] }}</p>
                                        <button wire:click="eliminarPregunta({{ $preguntaIndex }})"
                                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500">Eliminar</button>
                                        <button wire:click="cargarPregunta({{ $pregunta['id'] }})"
                                            class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-400">Editar</button>
                                    </div>
                                @endforeach
                            </div>
                            <script>
                                console.log({{ $paqueteId }})
                            </script>
                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>
</div>
