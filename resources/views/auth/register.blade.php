<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
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
                <input class="form__input"  type="text" placeholder="Nombre 1" autofocus required autocomplete="none" name="nombre_Usuario1">
                <input class="form__input" type="text" placeholder="Nombre 2" autocomplete="none" name="nombre_Usuario2">
            </div>
            <div>
                <input class="form__input" type="text" placeholder="Apellido 1" required autocomplete="none" name="apellido_Usuario1">
                <input class="form__input" type="text" placeholder="Apellido 2" autocomplete="none" name="apellido_Usuario2">
            </div>
            <div>
                <input class="form__input" type="number" placeholder="Número de documento" required autocomplete="none" name="noDocumento_Usuario">
                <input class="form__input" type="number" placeholder="Número de celular" required autocomplete="none" name="celular_Usuario">
            </div>
            <div>
                <input class="form__input" type="email" placeholder="Correo electrónico" required autocomplete="none" name="correo_Usuario">
            </div>
            <div>
                <input class="form__input" type="password" placeholder="Contraseña" required autocomplete="none" name="pasword_Usuario">
                <input class="form__input" type="password" placeholder="Confirmar contraseña" required autocomplete="none">
            </div>
            <div class="form__options">
                <input class="btn btn_largo" type="submit" value="Registrate">
                <p>Ya tienes cuenta, <a href="/login">Iniciar Sesión</p>
            </div>
        </form>
    </section>
</body>

</html>