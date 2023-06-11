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
        <form action="../../menuPrincipal" class="form register">
            <h2 class="title">Registrar usuario</h2>
            <div>
                <input class="form__input"  type="text" placeholder="Nombre 1" autofocus required autocomplete="none">
                <input class="form__input" type="text" placeholder="Nombre 2" autocomplete="none">
            </div>
            <div>
                <input class="form__input" type="text" placeholder="Apellido 1" required autocomplete="none">
                <input class="form__input" type="text" placeholder="Apellido 2" autocomplete="none">
            </div>
            <div>
                <input class="form__input" type="number" placeholder="Número de documento" required autocomplete="none">
                <input class="form__input" type="number" placeholder="Número de celular" required autocomplete="none">
            </div>
            <div>
                <input class="form__input" type="email" placeholder="Correo electrónico" required autocomplete="none">
            </div>
            <div>
                <input class="form__input" type="password" placeholder="Contraseña" required autocomplete="none">
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