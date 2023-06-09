<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tabla de puntuaciones') }}
            </h2>
        </x-slot>
        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Tabla de puntuaciones
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
                        <div>
                            <button wire:click="toggleMostrarFiltros"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Mostrar filtros
                            </button>
                            @if ($mostrarFiltros == true)
                                <div class="mt-4">
                                    <div class="flex items-center mb-4" wire:ignore>
                                        <label for="dificultad" class="mr-2">Dificultad:</label>
                                        <select wire:model="dificultadTerm" id="dificultad" 
                                            class="p-3 border border-gray-300 rounded">
                                            <option value="">Todas</option>
                                            <option value="1">Fácil</option>
                                            <option value="2">Normal</option>
                                            <option value="3">Difícil</option>
                                        </select>
                                    </div>

                                    <div class="flex items-center">
                                        <label for="usuario" class="mr-2">Nombre de usuario:</label>
                                        <select wire:model="opcionUsuario" id="usuario"
                                            class="p-3 border border-gray-300 rounded">
                                            <option value="">Todos los usuarios</option>
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button wire:click="$emit('refreshComponent')"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Buscar
                                    </button>
                                </div>
                            @endif
                        </div>
                        <br>


                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Usuario</th>
                                    <th class="px-4 py-2">Tiempo</th>
                                    <th class="px-4 py-2">Puntuación</th>
                                    <th class="px-4 py-2">Dificultad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calificaciones as $puntuacion)
                                    <tr>
                                        <td class="border px-4 py-2">
                                            {{ $usuarios->find($puntuacion->user_id)->get()->first()->name }}</td>
                                        @if ($puntuacion->tiempo < 60)
                                            <td class="border px-4 py-2">0:{{ $puntuacion->tiempo }}</td>
                                        @else
                                            <td class="border px-4 py-2">
                                                {{ floor($puntuacion->tiempo / 60) }}:{{ $puntuacion->tiempo % 60 }}
                                            </td>
                                        @endif
                                        <td class="border px-4 py-2">{{ $puntuacion->puntuacion }}</td>
                                        <td class="border px-4 py-2">{{ $puntuacion->dificultad }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.hook('afterDomUpdate', function () {
                    $('#dificultad').select2();
                });
            });
        </script>
    </x-app-layout>
</div>
