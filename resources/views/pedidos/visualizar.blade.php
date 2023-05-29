<!DOCTYPE html>
<html lang="en" class="noOverflow">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | De Castilla</title>
    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
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
            <h1>Pedidos</h1>
            <div class="opciones">
                <input type="radio" name="rd_Estado" id="rd_btn-porAprobar" class="btn-porAprobar">
                <label for="rd_btn-porAprobar" class="lbl_Estado btn-porAprobar">Por Arpobar</label>
                <input type="radio" name="rd_Estado" id="rd_btn-aprobado" class="btn-aprobado">
                <label for="rd_btn-aprobado" class="lbl_Estado btn-aprobado">Aprobado</label>
                <input type="radio" name="rd_Estado" id="rd_btn-preparandose" class="btn-preparandose">
                <label for="rd_btn-preparandose" class="lbl_Estado btn-preparandose">Preparandose</label>
                <input type="radio" name="rd_Estado" id="rd_btn-paraRecoger" class="btn-paraRecoger">
                <label for="rd_btn-paraRecoger" class="lbl_Estado btn-paraRecoger">Para Recoger</label>
                <input type="radio" name="rd_Estado" id="rd_btn-cancelados" class="btn-cancelados">
                <label for="rd_btn-cancelados" class="lbl_Estado btn-cancelados">Cancelados</label>
                <input type="radio" name="rd_Estado" id="rd_btn-aceptarCambios" class="btn-aceptarCambios">
                <label for="rd_btn-aceptarCambios" class="lbl_Estado btn-aceptarCambios">Aceptar Cambios</label>
                <input type="radio" name="rd_Estado" id="rd_Finalizado" class="btn-finalizados">
                <label for="rd_Finalizado" class="lbl_Estado btn-finalizados">Finalizados</label>
            </div>
            <div class="filtros">
                <div>
                    <img src="{{asset("assets/icons/lupa.png")}}" alt="">
                    <input type="text">
                    <img src="{{asset("assets/icons/agregar.png")}}" alt="" data-toggle="modal" data-target="#exampleModal">
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
                        <th scope="col">Cliente</th>
                        <th scope="col">Pedido</th>
                        <th scope="col">Fecha</th>
                        <th class="tabla__estado" scope="col">
                            Estado
                        </th>
                        <th class="tabla__opcion" scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Camila Arias</td>
                        <td>Cheese cake de limón</td>
                        <td>19/03/2023</td>
                        <td class="tabla__estado">
                            <span class="lbl_Estado btn-paraRecoger">Para recoger</span>
                        </td>
                        <td class="tabla__opcion">
                            <a href="./verPedido">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Vincent Camargo</td>
                        <td>Oblea especial</td>
                        <td>20/03/2023</td>
                        <td class="tabla__estado">
                            <span class="lbl_Estado btn-porAprobar">Por Arpobar</span>
                        </td>
                        <td class="tabla__opcion">
                            <a href="./verPedido">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Felipe Rodríguez</td>
                        <td>Wafle con nutella</td>
                        <td>17/03/2023</td>
                        <td class="tabla__estado">
                            <span class="lbl_Estado btn-aceptarCambios">Aceptar cambios</span>
                        </td>
                        <td class="tabla__opcion">
                            <a href="./verPedido">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Sebastián Junco</td>
                        <td>Arroz con leche</td>
                        <td>19/03/2023</td>
                        <td class="tabla__estado">
                            <span class="lbl_Estado btn-porAprobar">Por Arpobar</span>
                        </td>
                        <td class="tabla__opcion">
                            <a href="./verPedido">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <!-- -------------------Modal de agregar------------------ -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="btn_opciones">
                    <a href="../pedidos/nuevoPedido">
                        <img src="{{asset("assets/icons/mismoDia.png")}}" alt="">
                    </a>
                    <h2>Hoy</h2>
                </div>
                <div class="btn_opciones">
                    <a href="../pedidos/nuevoPedidoEspecial">
                        <img src="{{asset("assets/icons/eventoEspecial.png")}}" alt="">
                    </a>
                    <h2>Evento</h2>
                </div>
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