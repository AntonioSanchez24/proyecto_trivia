<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Juego') }}
        </h2>
    </x-slot>
   
    <x-juego />


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="juegoContainer">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
