<div>
    <script>
        var fotoPerfil = '{{ asset("storage/" . Auth::user()->profile_photo_path) }}';
        var usuario = '{{Auth::user()->name}}';
        var preguntasFacil = @json($preguntasJuego);
        console.log(preguntasFacil);
    </script>
    <x-juego/>
</div>
