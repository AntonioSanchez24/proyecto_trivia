<div class="create">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear pregunta') }}
            </h2>
        </x-slot>
        <x-pregunta-card>
            <livewire:preguntas-originales.create>
        </x-pregunta-card>
    </x-app-layout>
</div>
