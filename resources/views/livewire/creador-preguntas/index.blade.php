<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Tus paquetes de preguntas') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    @if (session()->has('message'))
                        <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="flex items-center mb-4">
                        <input wire:model="search" type="text" placeholder="Buscar paquetes de preguntas..." class="block w-full mt-1 rounded-md shadow-sm form-input"/>
                        <button wire:click="$emit('refreshComponent')"
                            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Buscar
                        </button>
                    </div>
                    @if ($paquetePreguntas->count() > 0)
                        @foreach($paquetePreguntas as $paquete)
                            <div class="flex items-start p-4 mb-4 bg-white rounded-lg shadow-md">
                                <div class="mr-6">
                                    <img src="{{ asset('$paquete->photo_url') }}" alt="{{ $paquete->nombre }}"
                                        class="w-20 h-20 mr-4 rounded-full"> &nbsp;
                                </div>
                                <div>
                                    <h2 class="mb-2 text-2xl font-bold">{{ $paquete->nombre }}</h2>
                                    <p class="mb-4 text-gray-600">{{ $paquete->descripcion }}</p>

                                    <a href="{{route('creadorPreguntas.edit', $paquete->id)}}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Editar</a>
                                    <a href="{{route('preguntasForm', $paquete->id)}}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Añadir preguntas</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1 class="mb-2 text-4xl font-bold">No se han encontrado paquetes de preguntas.</h2>
                    @endif
                    <div class="mt-4">
                        {{ $paquetePreguntas->links() }}
                    </div>
                    <a href="{{route('creadorPreguntas.create')}}" class="px-12 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Crear nuevo paquete</a>

                </div>
            </div>
        </div>
    </x-app-layout>
</div>
