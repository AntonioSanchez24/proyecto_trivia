<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Perfil') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-center">
                            <img class="w-32 h-32 rounded-full border-4 border-gray-200"
                                src="{{ $usuario->profile_photo_url }}" alt="{{ $usuario->name }}">
                        </div>
                        <div class="mt-4">
                            <h2 class="text-lg font-semibold text-gray-800">{{ $usuario->name }}</h2>
                        </div>
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">{{ $usuario->description }}</p>
                        </div>
                        <div class="flex items-center justify-center h-screen">
                            @if ($usuario->id == Auth::id())
                            @else
                                @if ($estado == 'aceptado')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline" wire:click="removeFriend">Eliminar amigo </button>
                                @elseif ($estado == 'pendiente')
                                    <button class="bg-gray-500 hover:bg-gray-700 text-black font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline"disabled>Solicitud de amigo enviada</button>
                                @elseif($estado != 'aceptado')
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline" wire:click="sendFriendRequest">Enviar solicitud</button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if($estado == 'aceptado')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-800">Puntuaciones recientes</h3>
                                <ul class="mt-2 text-sm text-gray-600">
                                    <table class="table-fixed w-full">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="px-4 py-2">Tiempo</th>
                                                <th class="px-4 py-2">Puntuación</th>
                                                <th class="px-4 py-2">Dificultad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($calificaciones as $puntuacion)
                                                <tr>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    </x-app-layout>
</div>
