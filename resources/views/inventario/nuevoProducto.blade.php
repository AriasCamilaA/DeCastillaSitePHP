<!DOCTYPE html>
<html lang="en" class="noOverflow">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario | De Castilla</title>
    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/agregarTipoCarrito.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
</head>

<div class="pagina">
    <!-- ---------------------------------------------menu superior------------------------------------ -->
    <nav class="menuSuperior">
        <div class="logosMenu">
            <div>
                <label for="menuHam">
                    <img class="icon" src="{{asset("assets/icons/Menu Hamburguesa.png")}}" alt="">
                </label>
                <input type="checkbox" id="menuHam">
                <div class="menuLateral">
                    <div class="menuLateral__Opcion">
                        <img src="{{asset("assets/icons/menuLateral/LogoVentas.png")}}" alt="icono">
                        <a href="../../ventas/visualizar">Ventas</a>
                    </div>
                    <div class="menuLateral__Opcion">
                        <img src="{{asset("assets/icons/menuLateral/LogoInventario.png")}}" alt="icono">
                        <a href="../../inventario/visualizar">Inventario</a>
                    </div>
                    <div class="menuLateral__Opcion">
                        <img src="{{asset("assets/icons/menuLateral/LogoProveedores.png")}}" alt="icono">
                        <a href="../../ordenes/visualizar">Proveedores</a>
                    </div>
                    <div class="menuLateral__Opcion">
                        <img src="{{asset("assets/icons/menuLateral/LogoPedidos.png")}}" alt="icono">
                        <a href="../../pedidos/visualizar">Pedidos</a>
                    </div>
                    <div class="menuLateral__Opcion">
                        <img src="{{asset("assets/icons/menuLateral/LogoUsuarios.png")}}" alt="icono">
                        <a href="../../usuarios/login">Usuarios</a>
                    </div>
                    <div class="menuLateral__Opcion">
                        <img src="{{asset("assets/icons/menuLateral/LogoEstadisticas.png")}}" alt="icono">
                        <a href="#">Estadísticas</a>
                    </div>
                </div>
            </div>
            <a href="../menuPrincipal">
                <img class="icon" src="{{asset("assets/icons/LogoCasa.png")}}" alt="">
            </a>
        </div>
        <div class="menu-logo">
            <img src="{{asset("assets/img/logoClaro.png")}}" alt="">
        </div>
        <div class="dropdown">
            <a class="dropdown-toggle menu-user" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="icon" src="{{asset("assets/icons/Logo Usuario.png")}}" alt="">
                <p class="user-name">Mi nombre</p>
            </a>
            <div class="dropdown-menu user-dropdown" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="#">
                    <img src="{{asset("assets/icons/LogoUserWhite.png")}}" alt="">
                    Perfil
                </a>
                <a class="dropdown-item" href="../../">
                    <img src="{{asset("assets/icons/LogoOffWhite.png")}}" alt="">
                    Cerrar Sesión
                </a>
            </div>
        </div>
    </nav>
    <!-- ---------------------------------------------Contenido----------------------------------------- -->
    <div class="contenido">
        <form action="" class="form">
            <div>
                <h1 class="form__title">Agregar Insumo</h1>
            </div class="form__contenido">
                <div>
                <div>
                    <label for="">Nombre</label>
                    <input type="text" placeholder="Nombre insumo">
                </div>
                <div>
                    <label for="">precio</label>
                    <input type="text" placeholder="precio insumo">
                </div>
                <div>
                    <botton class="btn">Agregar Insumo</botton>
                </div>
            </div>
        </form>
    </div>
</div>

</html>