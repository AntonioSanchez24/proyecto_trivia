<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Juego') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <livewire:juego>

        <div class="py-12">
            <x-banner data="{ show: true, style: danger, message: 'El juego puede tardar un poco en cargar en conexiones limitadas.' }"/>
            <div class="mx-auto max-w-7x1 sm:px-6 lg:px-8">
                <div id="juegoContainer" width="1620px" height="720px" autofocus="true">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    </div>
                </div>
            </div>
</x-app-layout>
