<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trivia Hub</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-gray-100">
    <div class="flex flex-col justify-center min-h-screen py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img src="{{ asset('img/logo.png') }}" class="mx-auto w-50 h-36">
            <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
                ¡Bienvenido a Trivia Hub!
            </h2>
            <p class="mt-2 text-center text-gray-600 text-md">
                El lugar donde tú y tus amigos podréis jugar a los mejores juegos de trivial que existen.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <div class="space-y-6">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">
                            Millonario: Nuestro Primer Juego
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">
                            Vive la experiencia más innovadora del juego ¿Quién quiere ser millonario? Prepárate para
                            enfrentarte a un emocionante desafío de trivial en la carrera por convertirte en millonario.
                        </p>
                    </div>
                    @if (Auth::user())
                        <div>
                            <a href="{{ route('login') }}"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">
                                ¡Entra para jugar!
                            </a>
                        </div>
                    @else
                        <div>
                            <a href="{{ route('login') }}"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">
                                ¡Inicia sesión para jugar!
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('register') }}"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">
                                ¿No tienes cuenta? ¡Regístrate!
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
