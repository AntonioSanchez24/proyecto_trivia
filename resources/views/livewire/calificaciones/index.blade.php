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
                        <div class="border-spacing-2 border-black border-solid border-2">
                            <div class="mt-4 mb-4 ms-4 me-4">
                                <div class="flex items-center mb-4" wire:ignore>
                                    <label for="dificultad" class="mr-2"
                                        style="margin-left: 30px !important;">Dificultad:</label>
                                    <select wire:model="dificultadTerm" id="dificultad"
                                        class="p-3 border border-gray-300 rounded">
                                        <option value="">Todas</option>
                                        <option value="1">Fácil</option>
                                        <option value="2">Normal</option>
                                        <option value="3">Difícil</option>
                                    </select>
                                    <label for="usuario" class="mr-2" style="margin-left: 30px !important;">Nombre de
                                        usuario:</label>
                                    <select wire:model="opcionUsuario" id="usuario"
                                        class="p-3 border border-gray-300 rounded">
                                        <option value="">Todos los usuarios</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endforeach
                                    </select>
                                    <button wire:click="cambiar"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        style="margin-left: 30px !important;">
                                        Buscar
                                    </button>
                                </div>

                            </div>
                        </div>
                        <br>


                        @if($calificaciones != null)

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
                                        @if ($puntuacion->dificultad == 1)
                                            <td class="border px-4 py-2">Fácil</td>
                                        @elseif($puntuacion->dificultad == 2)
                                            <td class="border px-4 py-2">Normal</td>
                                        @else
                                            <td class="border px-4 py-2">Dificil</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $calificaciones->links() }}
                        @else
                        <h1 class="text-xl">No hay puntuaciones de este tipo.</h1>
                        @endif  
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dificultad').select2();
                $('#usuario').select2();

                $("#usuario").on('change', function(e) {
                    @this.set('opcionUsuario', $('#usuario').val());

                    $("#dificultad").on('change', function(e) {
                        @this.set('dificultadTerm', $('#dificultad').val())
                    });
                });

            });
        </script>
    </x-app-layout>
</div>
