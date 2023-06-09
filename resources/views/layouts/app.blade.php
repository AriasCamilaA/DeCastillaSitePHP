<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'De Castilla Site') }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/landing.css')}}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div id="app">
        <!-- ---------------------------------------------menu superior------------------------------------ -->
        {{-- Si NO inicio Sesión --}}
        @guest
        <nav class="landingMenu__Superior">
            <div class="menu-logo nav-landing">
                <a href="/landing">
                    <img src="{{asset('assets/img/logoClaro.png')}}" alt="">
                </a>
                <div class="landingMenu__links">
                    <ul>
                        <li><a href="#banner">Inicio</a></li>
                        <li><a href="#quienes_somos">Quienes somos</a></li>
                        <li><a href="#especialidades">Menú</a></li>
                        <li><a href="#galeria">Galería</a></li>
                        <li><a href="#contactanos">Contactanos</a></li>
                    </ul>
                </div>
            </div>
            <div class="landingMenu__btns">
                <a href="/login" class="btn">Iniciar Sesión</a>
                <a href="/register" class="btn" name="btn_register">Registrarse</a>
            </div>
        </nav>
        {{-- Si SI se ha iniciado sesión --}}
        @else
        <nav class="menuSuperior">
            <div class="logosMenu">
                <div>
                    <label for="menuHam">
                        <img class="icon" src="{{asset('assets/icons/Menu Hamburguesa.png')}}" alt="">
                    </label>
                    <input type="checkbox" id="menuHam">
                    <div class="menuLateral">
                        <div class="menuLateral__Opcion">
                            <img src="{{asset('assets/icons/menuLateral/LogoVentas.png')}}" alt="icono">
                            <a href="../ventas/visualizarVenta">Ventas</a>
                        </div>
                        <div class="menuLateral__Opcion">
                            <img src="{{asset('assets/icons/menuLateral/LogoInventario.png')}}" alt="icono">
                            <a href="../inventario/visualizarInventario">Inventario</a>
                        </div>
                        <div class="menuLateral__Opcion">
                            <img src="{{asset('assets/icons/menuLateral/LogoProveedores.png')}}" alt="icono">
                            <a href="../ordenes/visualizar">Proveedores</a>
                        </div>
                        <div class="menuLateral__Opcion">
                            <img src="{{asset('assets/icons/menuLateral/LogoPedidos.png')}}" alt="icono">
                            <a href="../pedidos/visualizar">Pedidos</a>
                        </div>
                        <div class="menuLateral__Opcion">
                            <img src="{{asset('assets/icons/menuLateral/LogoUsuarios.png')}}" alt="icono">
                            <a href="../usuarios/login">Usuarios</a>
                        </div>
                        <div class="menuLateral__Opcion">
                            <img src="{{asset('assets/icons/menuLateral/LogoEstadisticas.png')}}" alt="icono">
                            <a href="#">Estadísticas</a>
                        </div>
                    </div>
                </div>

                @if(!request()->is('/'))
                    <a href="/">
                        <img class="icon" src="{{asset('assets/icons/LogoCasa.png')}}" alt="">
                    </a>
                @endif

            </div>
            <div class="menu-logo">
                <img src="{{asset('assets/img/logoClaro.png')}}" alt="">
            </div>
            <div class="dropdown">
                <button class="dropdown-toggle menu-user" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="icon" src="{{asset('assets/icons/Logo Usuario.png')}}" alt="">
                    {{ Auth::user()->nombre_Usuario }}
                </button>
                <ul class="dropdown-menu user-dropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            <img src="{{asset('assets/icons/LogoUserWhite.png')}}" alt="">
                            Perfil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <img src="{{asset('assets/icons/LogoOffWhite.png')}}" alt="">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        @endguest
        <!-- ---------------------------------------------Contenido------------------------------------ -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>
