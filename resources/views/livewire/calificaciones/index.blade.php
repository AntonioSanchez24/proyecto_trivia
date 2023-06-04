<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calificaciones') }}
        </h2>
    </x-slot>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
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
                    <button 
                        class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Create New Category
                    </button>
                    
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">Usuario</th>
                                    <th class="px-4 py-2">Tiempo</th>
                                    <th class="px-4 py-2">Puntuación</th>
                                    <th class="px-4 py-2">Dificultad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calificaciones as $puntuacion)
                                    <tr>
                                        <td class="border px-4 py-2">{{$usuario->find($puntuacion->user_id)->get()->first()->name}}</td>
                                        @if($puntuacion->tiempo < 60)
                                        <td class="border px-4 py-2">0:{{$puntuacion->tiempo}}</td>
                                        @else
                                        <td class="border px-4 py-2">{{floor($puntuacion->tiempo / 60)}}:{{$puntuacion->tiempo % 60}}</td>
                                        @endif
                                        <td class="border px-4 py-2">{{$puntuacion->puntuacion}}</td>
                                        <td class="border px-4 py-2">{{$puntuacion->dificultad}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
