@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/modalForms.css")}}">
        <!-- ---------------------------------------------Contenido----------------------------------------- -->
        <div class="contenido">
            <h1>Inventario</h1>
            <div class="opciones">
                <input type="radio" name="rd_Estado" id="rd_btn-porAprobar" class="btn">
                <label for="rd_btn-porAprobar" class="lbl_Estado btn">Productos</label>
                <input type="radio" name="rd_Estado" id="rd_btn-aprobado" class="btn">
                <label for="rd_btn-aprobado" class="lbl_Estado btn">Insumos</label>
                </div>
            <div class="filtros">
                <div>
                    <img src="{{asset("assets/icons/lupa.png")}}" alt="">
                    <input type="text">
                    <img src="{{asset("assets/icons/agregar.png")}}" alt="" data-toggle="modal" data-target=".bd-example-modal-xl">
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
                             <a href="./verProducto">
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
                             <a href="./verProducto">
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
                             <a href="./verProducto">
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
                             <a href="./verProducto">
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
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">Agregar Producto</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modalProductos__contenidos">
                    <h2>Categoría</h2>
                    <div class="modalProductos__campos">
                        <div class="label">
                            <img src="{{asset("assets/icons/lupa.png")}}" alt="">
                        </div>
                        <input type="text" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Nombre</label>
                        <input type="text" placeholder="Nombre del producto" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Precio</label>
                        <input type="number" placeholder="Precio del producto" required>
                    </div>
                    <input class="btn" type="button" value="Agregar producto" >
                </div>
                <img class="product" src="{{asset("assets/img/galeria 2.png")}}" alt="Postre">
            </div>
          </div>
        </div>
      </div>

@endsection
