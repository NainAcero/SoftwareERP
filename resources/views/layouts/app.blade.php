<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucfirst($title ?? '') }} | {{ config('app.name', 'Clinica-Utc') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.12.1-web/css/all.min.css') }}">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="{{asset('roboto.css')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('mdb/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('mdb/css/mdb.min.css') }}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ asset('mdb/css/style.css') }}">


    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('mdb/js/jquery.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('mdb/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>

    <!-- notify -->
    <script src="{{ asset('js/notify.min.js') }}"></script>

    <!-- alertify -->
    <link rel="stylesheet" href="{{ asset('js/jquery-confirm-v3.3.4/dist/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/jquery-confirm-v3.3.4/dist/jquery-confirm.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
    </script>

    @stack('linksCabeza')


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
                        @else
                            @auth
                                <li><a class="nav-link" href="{{ route('home') }}">{{ __("Inicio") }}</a></li>

                                @can('G. Usuarios')
                                    <li><a class="nav-link" href="{{ route('usuarios') }}">{{ __("Usuarios") }}</a></li>
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
                                            <a class="dropdown-item"  href="categorias" > {{ __("Categorías") }} </a>
                                            <a class="dropdown-item"  href="productos" > {{ __("Productos") }} </a>

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
                                            <a class="dropdown-item"  href="facturas" > {{ __("Facturas") }} </a>

                                        </div>
                                    </li>
                                @endcan

                                @role('Administrador')
                                    <li><a class="nav-link" href="{{ route('roles') }}">{{ __("Roles y Permisos") }}</a></li>
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
                                        <a class="dropdown-item"  href="mi-perfil" > {{ __("Mi Perfil") }} </a>
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

    <main>
        @yield('jumbotron')
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


    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/mdb.min.js') }}"></script>

    @stack('linksPie')


    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $('table').on('draw.dt', function() {
			$('[data-toggle="tooltip"]').tooltip();
        });

        function eliminar(arg){
			var url=$(arg).data('url');
			var msg=$(arg).data('title');
			$.confirm({
				title: msg,
				content: 'No podra recuperar el contenido',
				theme: 'modern',
				type:'dark',
				icon:'fas fa-trash',
				closeIcon:true,
				buttons: {
					confirmar: function () {
						location.replace(url);
					}
				}
			});
		}

    </script>
</body>
</html>
