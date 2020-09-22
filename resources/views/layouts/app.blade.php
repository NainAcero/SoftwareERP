<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ERP') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

    @stack('styles')

</head>
<body>

    <div id="app">

        <header>
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <!-- Left Side of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side of Navbar -->
                        <ul class="navbar-nav ml-auto">

                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __("Iniciar sessión") }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __("Registrarme") }}</a></li>
                            @else
                                @auth
                                    <li><a class="nav-link" href="{{ route('home') }}">{{ __("Inicio") }}</a></li>

                                    @can('G. Usuarios')
                                        <li><a class="nav-link" href="{{ route('home') }}">{{ __("Usuarios") }}</a></li>
                                    @endcan

                                    @can('G. Almacén')
                                        <li class="nav-item dropdown">
                                            <a
                                                class="nav-link dropdown-toggle"
                                                href="#"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                {{ __("Almacén") }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item"  href="#" > {{ __("Categorías") }} </a>
                                                <a class="dropdown-item"  href="#" > {{ __("Productos") }} </a>

                                            </div>
                                        </li>
                                    @endcan

                                    @can('G. Ventas')
                                        <li class="nav-item dropdown">
                                            <a
                                                class="nav-link dropdown-toggle"
                                                href="#"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                {{ __("Ventas") }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item"  href="#" > {{ __("Facturas") }} </a>

                                            </div>
                                        </li>
                                    @endcan

                                    @role('Administrador')
                                        <li><a class="nav-link" href="{{ route('home') }}">{{ __("Roles y Permisos") }}</a></li>
                                    @endrole

                                    <li class="nav-item dropdown">
                                        <a
                                            class="nav-link dropdown-toggle"
                                            href="#"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            {{ auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"  href="#" > {{ __("Mi Perfil") }} </a>
                                            <a
                                                class="dropdown-item"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                                            >
                                                {{ __("Cerrar sessión") }}
                                            </a>

                                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display:none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endauth
                            @endguest

                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="mt-4">

            @yield('breadcrumbs')

            @if ($errors->any())
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><strong>{{ $error }}</strong></li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @foreach (['success', 'warn', 'info', 'error'] as $msg)
                @if(Session::has($msg))
                <script>
                    $.notify("{{ Session::get($msg) }}", "{{ $msg }}");
                </script>
                @endif
            @endforeach

            @yield('content')

        </main>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

</body>
</html>
