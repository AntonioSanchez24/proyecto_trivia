<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Juego') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @livewire('juego-personalizado.play', ['id' => $id])

    <div>
        <div class="text-xl font-medium text-black">Aviso</div>
        <p class="text-gray-500">Debido a problemas con el servidor, el juego puede tardar algo en cargar por
            primera vez.</p>
    </div>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div id="juegoContainer" width="1620px" height="720px" autofocus="true">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
