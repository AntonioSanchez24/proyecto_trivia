<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Juego') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @livewire('juego-personalizado.play', ['id' => $id])

    <div class="flex items-center max-w-2xl p-6 mx-auto space-x-4 bg-white shadow-md rounded-xl">
        <div class="flex-shrink-0">
            <svg class="w-12 h-12 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <div>
            <div class="text-xl font-medium text-black">Aviso</div>
            <p class="text-gray-500">Debido a problemas con el servidor, el juego puede tardar algo en cargar por
                primera vez.</p>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7x1 sm:px-6 lg:px-8">
            <div id="juegoContainer" width="1620px" height="720px" autofocus="true">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                </div>
            </div>
        </div>

        <script>
            window.onload = function() {
                var gameElement = document.getElementById('juegoContainer'); // Cambia 'miJuego' al ID de tu contenedor de Phaser
                var gamePosition = gameElement.getBoundingClientRect().top;
                var offsetPosition = gamePosition - window.innerHeight / 2 + gameElement.clientHeight / 2;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            };
        </script>

</x-app-layout>
