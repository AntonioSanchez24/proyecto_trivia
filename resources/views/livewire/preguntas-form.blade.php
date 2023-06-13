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

                            <form wire:submit.prevent="guardarPregunta" class="space-y-6">
                                <input type="hidden" wire:model="preguntaId">

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
                                    <div>
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-500 text-white rounded-md">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="p-6 border border-black border-solid border-2 rounded-lg shadow-lg bg-white">
                            <h2 class="block text-gray-700 text-lg font-medium mb-2">
                                Preguntas añadidas
                            </h2>
                            <div class="mt-10 space-y-6">
                                @foreach ($preguntasArray as $pregunta)
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <h2 class="text-xl font-bold">{{ $pregunta['pregunta'] }}</h2>
                                        <p>{{ $pregunta['respuesta_correcta'] }}</p>
                                        <p>
                                            @php
                                                // Comprueba si es un string (JSON)
                                                if(is_string($pregunta['respuestas_incorrectas'])) {
                                                    // Decodifica JSON a un array
                                                    $respuestas_incorrectas = json_decode($pregunta['respuestas_incorrectas'], true);
                                                } else {
                                                    // Asume que es un array
                                                    $respuestas_incorrectas = $pregunta['respuestas_incorrectas'];
                                                }
                                            @endphp
                                            {{ implode(', ', $respuestas_incorrectas) }}
                                        </p>                                        <p>{{ $pregunta['categoria'] }}</p>
                                        <p>{{ $pregunta['dificultad'] }}</p>
                                        <div class="mt-4">
                                            <button wire:click="cargarPregunta({{ $pregunta['id'] }})"
                                                class="px-4 py-2 bg-blue-500 text-white rounded-md">Editar</button>
                                            <button wire:click="eliminarPregunta({{ $pregunta['id'] }})"
                                                class="px-4 py-2 bg-red-500 text-white rounded-md">Eliminar</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>
</div>
