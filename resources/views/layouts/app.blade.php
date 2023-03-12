<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/sass/app.scss'])
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">

            <h1 class="text-3xl font-black ">
                <i class="fa-brands fa-instagram"></i> DevStagram
            </h1>
            @auth
            <p>
                <i class="fa fa-user" aria-hidden="true"></i>
                {{ auth()->user()->username}}
            </p>
            @endauth

            @if(!auth()->check())
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login.index')}}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Login</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register.index')}}">Registro</a>
            </nav>

            @else
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('logout')}}">
                    Cerrar sesión</a>
            </nav>

            @endif

        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>
        @yield('content')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold">
        <i class="fa fa-copyright" aria-hidden="true"></i>
        DevStagram - MelarcAB
        @php //{{date('Y')}}@endphp
        {{now()->year}}
    </footer>


</body>

</html>