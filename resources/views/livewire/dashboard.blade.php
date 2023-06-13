<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <!-- Últimas calificaciones de amigos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl mb-2">Últimas calificaciones</h2>
                        <table class="table-fixed w-full">
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
                            @endif
                        </table>
                        @if ($calificaciones != null)
                            <div class="mt-4">
                                {{ $calificaciones->links() }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Últimos paquetes de preguntas hechos por amigos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl mb-2">Últimos paquetes de preguntas</h2>
                        @if ($preguntas != null)
                            @foreach ($preguntas as $paquete)
                                <div class="bg-white rounded-lg shadow-md p-4 flex items-start mb-4">
                                    <div class="mr-6">
                                        <img src="{{ $paquete->photo_url }}" alt="{{ $paquete->nombre }}"
                                            class="w-20 h-20 rounded-full mr-4"> &nbsp;
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold mb-2">{{ $paquete->nombre }}</h2>
                                        <p class="text-gray-600 mb-4">{{ $paquete->descripcion }}</p>
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
                            <h1 class="text-4xl font-bold mb-2">No se han encontrado paquetes de preguntas.</h2>
                        @endif
                        @if ($preguntas != null)
                            <div class="mt-4">
                                {{ $preguntas->links() }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Solicitudes de amigos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl mb-2">Solicitudes de amigos</h2>
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
                                                class="mr-2 px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
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
