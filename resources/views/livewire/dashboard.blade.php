<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <div>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="mb-2 text-2xl">Últimas calificaciones</h2>
                        <table class="w-full table-fixed">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Usuario</th>
                                    <th class="px-4 py-2">Tiempo</th>
                                    <th class="px-4 py-2">Puntuación</th>
                                    <th class="px-4 py-2">Dificultad</th>
                                </tr>
                            </thead>
                            @if ($calificaciones != null)
                            <tbody>
                                @foreach ($calificaciones as $puntuacion)
                                    <tr>
                                        <td class="px-4 py-2 border">
                                            {{ $usuarios->find($puntuacion->user_id)->name }}</td>
                                        <td class="px-4 py-2 border">
                                            {{ gmdate('i:s', $puntuacion->tiempo) }}
                                        </td>
                                        <td class="px-4 py-2 border">{{ $puntuacion->puntuacion }}</td>
                                        @if ($puntuacion->dificultad == 1)
                                            <td class="px-4 py-2 border">Fácil</td>
                                        @elseif($puntuacion->dificultad == 2)
                                            <td class="px-4 py-2 border">Normal</td>
                                        @else
                                            <td class="px-4 py-2 border">Dificil</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                        @if ($calificaciones != null)
                            <div class="mt-4">
                                {{ $calificaciones->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <br>

            <!-- Últimos paquetes de preguntas hechos por amigos -->
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-2 text-2xl">Últimos paquetes de preguntas</h2>
                    @if ($preguntas != null)
                        @foreach ($preguntas as $paquete)
                            <div class="flex items-start p-4 mb-4 bg-white rounded-lg shadow-md">
                                <div class="mr-6">
                                    <img src="{{ $paquete->photo_url }}" alt="{{ $paquete->nombre }}"
                                        class="w-20 h-20 mr-4 rounded-full"> &nbsp;
                                </div>
                                <div>
                                    <h2 class="mb-2 text-2xl font-bold">{{ $paquete->nombre }}</h2>
                                    <p class="mb-4 text-gray-600">{{ $paquete->descripcion }}</p>
                                    @if ($suscripciones != null)
                                        @if (in_array($paquete->id, $suscripciones))
                                            <button wire:click="desuscribirse({{ $paquete->id }})"
                                                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">
                                                Desuscribirse
                                            </button>
                                        @else
                                            <button wire:click="suscribirse({{ $paquete->id }})"
                                                class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                                                Suscribirse
                                            </button>
                                        @endif
                                    @else
                                        <button wire:click="suscribirse({{ $paquete->id }})"
                                            class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                                            Suscribirse
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1 class="mb-2 text-4xl font-bold">No se han encontrado paquetes de preguntas.</h2>
                    @endif
                    @if ($preguntas != null)
                        <div class="mt-4">
                            {{ $preguntas->links() }}
                        </div>
                    @endif
                </div>
            </div>
            <br>

            <!-- Solicitudes de amigos -->
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-2 text-2xl">Solicitudes de amigos</h2>
                    <ul>
                        @foreach ($solis as $solicitud)
                            <li class="mb-4">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <a
                                            href='{{ route('perfil.mostrar', $solicitud->id) }}'>{{ $solicitud->name }}</a>
                                    </div>

                                    <div class="flex">
                                        <button wire:click="acceptFriendRequest({{ $solicitud->id }})"
                                            class="px-4 py-2 mr-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            Aceptar
                                        </button>
                                        <button wire:click="denyFriendRequest({{ $solicitud->id }})"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Rechazar
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
