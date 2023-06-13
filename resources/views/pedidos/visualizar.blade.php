@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
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
      @endsection
