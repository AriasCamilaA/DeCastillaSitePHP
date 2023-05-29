<!DOCTYPE html>
<html lang="en" class="noOverflow">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario | De Castilla</title>
    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
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
            <h1>Inventario</h1>
            <div class="opciones">
                <input type="radio" name="rd_Estado" id="rd_btn-porAprobar" class="btn-paraRecoger">
                <label for="rd_btn-porAprobar" class="lbl_Estado btn-paraRecoger">Productos</label>
                <input type="radio" name="rd_Estado" id="rd_btn-aprobado" class="btn-paraRecoger">
                <label for="rd_btn-aprobado" class="lbl_Estado btn-paraRecoger">Insumos</label>
                </div>
            <div class="filtros">
                <div>
                    <img src="{{asset("assets/icons/lupa.png")}}" alt="">
                    <input type="text">
                    <a href="./nuevoProducto">
                        <img src="{{asset("assets/icons/agregar.png")}}" alt="">
                    </a>
                </div>
                <div class="filtros__fecha">
                    <input type="date" name="" id="">
                    <input type="date" name="" id="">
                </div>
                <img src="{{asset("assets/icons/excel.png")}}" alt="">
            </div>
            <div class="tabla">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Total</th>
                        <th class="tabla__opcion" scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Empleado</td>
                        <td>21/03/2023</td>
                        <td>14:15</td>
                        <td>
                            <span class="tabla__total">25.000</span>
                        </td>
                        <td class="tabla__opcion">
                             <a href="./verVenta">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Administrador</td>
                        <td>15/03/2023</td>
                        <td>13:33</td>
                        <td>
                            <span class="tabla__total">5.000</span>
                        </td>
                        <td class="tabla__opcion">
                             <a href="./verVenta">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Administrador</td>
                        <td>18/03/2023</td>
                        <td>12:54</td>
                        <td>
                            <span class="tabla__total">19.000</span>
                        </td>
                        <td class="tabla__opcion">
                             <a href="./verVenta">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Empleado</td>
                        <td>17/03/2023</td>
                        <td>18:01</td>
                        <td>
                            <span class="tabla__total">12.000</span>
                        </td>
                        <td class="tabla__opcion">
                             <a href="./verVenta">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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