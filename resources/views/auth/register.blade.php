<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/botones.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
</head>

<body class="fondoTranslucido">
    <section class="container">
        <a class="logo" href="/landing">
            <img src="{{asset("assets/img/logo_letra_oscura.png")}}">
        </a>
        <form action="{{ route('register') }}" class="form register" method="POST">
            @csrf
            <h2 class="title">Registrar usuario</h2>
            <div>
                <input class="form__input" type="text" placeholder="Nombre 1" autofocus required autocomplete="none" name="nombre_Usuario1" value="{{old('nombre_Usuario1')}}">
                <input class="form__input" type="text" placeholder="Nombre 2" autocomplete="none" name="nombre_Usuario2" value="{{old('nombre_Usuario2')}}">
            </div>
            <div>
                <input class="form__input" type="text" placeholder="Apellido 1" required autocomplete="none" name="apellido_Usuario1" value="{{old('apellido_Usuario1')}}">
                <input class="form__input" type="text" placeholder="Apellido 2" autocomplete="none" name="apellido_Usuario2" value="{{old('apellido_Usuario2')}}">
            </div>
            <div>
                <input class="form__input" type="number" placeholder="Número de documento" required autocomplete="none" name="noDocumento_Usuario" value="{{old('noDocumento_Usuario')}}">
                <input class="form__input" type="number" placeholder="Número de celular" required autocomplete="none" name="celular_Usuario" value="{{old('celular_Usuario')}}">
            </div>
            <div>
                <input class="form__input" type="email" placeholder="Correo electrónico" required autocomplete="none" name="email" value="{{old('email')}}">
            </div>
            <div>
                <input class="form__input" type="password" placeholder="Contraseña" required autocomplete="none" name="password">
                <input class="form__input" type="password" placeholder="Confirmar contraseña" required autocomplete="none" name="password_confirmation">
            </div>
            <div class="form__options">
                <input class="btn btn_largo" type="submit" value="Registrate">
                <p>Ya tienes cuenta, <a href="/login">Iniciar Sesión</a></p>
            </div>
        </form>
    </section>

    <!-- Modal de errores -->
    <div class="modal fade bd-example-modal-xl" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Errores de validación</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        // Mostrar el modal de errores al cargar la página si hay errores
        $(document).ready(function() {
            @if ($errors->any())
                $('#errorModal').modal('show');
            @endif
        });
    </script>
</body>

</html>
