<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Comunidad') }}
            </h2>
        </x-slot>
        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Comunidad
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
                        <div class="flex items-center">
                            <input type="text" placeholder="Buscar usuarios" wire:model.lazy="searchTerm"
                                class="py-2 px-4 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <button wire:click="$emit('refreshComponent')"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Buscar
                            </button>
                        </div>
                        <br>
                        @if ($users->count() > 0)
                            @foreach ($users as $usuario)
                                <div class="bg-white rounded-lg shadow-md p-4 flex items-start">
                                    <div class="mr-6">
                                        <img src="{{ $usuario->profile_photo_url }}" alt="{{ $usuario->name }}"
                                            alt="Imagen" class="w-20 h-20 rounded-full mr-4"> &nbsp;
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold mb-2">{{ $usuario->name }}</h2>
                                        @if ($usuario->description)
                                            <p class="text-gray-600 mb-4">{{ $usuario->description }}</p>
                                        @else
                                            <p class="text-gray-600 mb-4">No tengo tiempo para descripciones, sólo
                                                trivial.
                                            </p>
                                        @endif
                                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('perfil.mostrar', ['username' => $usuario->name]) }}">Ver perfil</a>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        @else
                            <h1 class="text-4xl font-bold mb-2">No se han encontrado usuarios.</h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
