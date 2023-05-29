<!DOCTYPE html>
<html lang="en" class="noOverflow">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | De Castilla</title>
    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/agregarTipoCarrito.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
</head>

<body class="body">

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
            <div class="catalogo">
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carrito">
                <h2>Pedido</h2>
                <div class="carrito__productos carrito__productos-especial">
                    <div class="carrito__producto">
                        <img src="{{asset("assets/img/galeria 3.png")}}" alt="">
                        <div class="producto__descripcion">
                            <h5>Producto</h5>
                            <p>$5000</p>
                        </div>
                        <input type="number" name="" id="" value="2">
                    </div>
                    <div class="carrito__producto">
                        <img src="{{asset("assets/img/galeria 3.png")}}" alt="">
                        <div class="producto__descripcion">
                            <h5>Producto</h5>
                            <p>$5000</p>
                        </div>
                        <input type="number" name="" id="" value="2">
                    </div>
                    <div class="carrito__producto">
                        <img src="{{asset("assets/img/galeria 3.png")}}" alt="">
                        <div class="producto__descripcion">
                            <h5>Producto</h5>
                            <p>$5000</p>
                        </div>
                        <input type="number" name="" id="" value="2">
                    </div>
                </div>
                <div class="carrito__opciones">
                    <textarea name="" id="" cols="30" rows="4"></textarea>
                    <input type="date" name="" id="">
                    <div class="carrito__total">
                        <p>Total: $</p>
                        <input type="number" value="10000">
                    </div>
                    <a href="#" class="btn">Realizar Pedido</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>