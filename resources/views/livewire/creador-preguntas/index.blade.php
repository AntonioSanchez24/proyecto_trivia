<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tus paquetes de preguntas') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="flex items-center mb-4">
                        <input wire:model="search" type="text" placeholder="Buscar paquetes de preguntas..." class="form-input rounded-md shadow-sm mt-1 block w-full"/>
                        <button wire:click="$emit('refreshComponent')"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Buscar
                        </button>
                    </div>
                    @if ($paquetePreguntas->count() > 0)
                        @foreach($paquetePreguntas as $paquete)
                            <div class="bg-white rounded-lg shadow-md p-4 flex items-start mb-4">
                                <div class="mr-6">
                                    <img src="{{ $paquete->photo_url }}" alt="{{ $paquete->nombre }}"
                                        class="w-20 h-20 rounded-full mr-4"> &nbsp;
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold mb-2">{{ $paquete->nombre }}</h2>
                                    <p class="text-gray-600 mb-4">{{ $paquete->descripcion }}</p>
                                    
                                    <a href="{{route('creadorPreguntas.edit', $paquete->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                    <a href="{{route('preguntasForm', $paquete->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Añadir preguntas</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1 class="text-4xl font-bold mb-2">No se han encontrado paquetes de preguntas.</h2>
                    @endif
                    <div class="mt-4">
                        {{ $paquetePreguntas->links() }}
                    </div>
                    <a href="{{route('creadorPreguntas.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-12 rounded">Crear nuevo paquete</a>

                </div>
            </div>
        </div>
    </x-app-layout>
</div>