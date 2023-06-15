<div>
    <script>
        @if(Auth::user()->profile_photo_path == null)
        var fotoPerfil = 'img/default.jpg';
        console.log(fotoPerfil)
        @else
        var fotoPerfil = '{{ asset("storage/" . Auth::user()->profile_photo_path) }}';

        @endif
        var usuario = '{{Auth::user()->name}}';
        var usuarioID = '{{Auth::user()->id}}';
        var preguntaQuery = @json($pregunta);
        var preguntaSalto = @json($preguntaSalto);
        console.log(preguntaQuery);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.60.0/phaser.js"></script>
    <script src={{asset('js/scenes/gameConfig.js')}} type="module"></script>

</div>
