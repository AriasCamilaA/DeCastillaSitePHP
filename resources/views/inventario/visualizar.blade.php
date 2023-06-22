@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/modalForms.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/tab_tabla.css")}}">
        <!-- ---------------------------------------------Contenido----------------------------------------- -->
        <div class="contenido">
            <h1>Inventario</h1>
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

            <div class="tablaConTab">
                <div>
                  <button class="tablink bg-oscuro" onclick="openCity(event,'Insumos')">Insumos</button>
                  <button class="tablink" onclick="openCity(event,'Productos')">Productos</button>
                </div>
                
                <div id="Insumos" class="tab_content">
                    <div class="tabla">
                        <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Insumo</th>
                                <th scope="col">Entradas</th>
                                <th scope="col">Salidas</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($vw_inventario_insumo as $insumos)
                                <th>{{$insumos->ID}}</th>
                                <td>{{$insumos->INSUMO}}</td>
                                <td>{{$insumos->ENTRADAS}}</td>
                                <td>{{$insumos->SALIDAS}}</td>
                                <td>{{$insumos->STOCK}}</td>
                                <td class="tabla__opcion">
                                    <a href="./verProducto">
                                       <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                                   </a>
                               </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
              
                <div id="Productos" class="tab_content" style="display:none">
{{-- ------------------------------------tabla productos --}}
               </div>
                </div>
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
      <script src="{{asset('assets/js/tab_tabla.js')}}"></script>
@endsection
