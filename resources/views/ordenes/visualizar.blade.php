@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/tablas.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/botones.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/modalForms.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/proveedores.css')}}">
<!-- ---------------------------------------------Contenido----------------------------------------- -->
<div class="contenido">
    <h1>Ordenes de Compra</h1>
    <div class="contenido_proveedores">
        <div>
            <div class="filtros">
                <div>
                    <img src="{{asset('assets/icons/lupa.png')}}" alt="">
                    <input type="text">
                    <img src="{{asset('assets/icons/agregar.png')}}" alt="" data-toggle="modal"
                        data-target=".bd-example-modal-xl">
                </div>

                <img src="{{asset('assets/icons/excel.png')}}" alt="">
            </div>
            <div class="tabla">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Calificaión</th>
                            <th class='tabla__opcion' scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                        <tr>
                            <th>{{$proveedor->id_proveedor}}</th>
                            <td>{{$proveedor->empresa_proveedor}}</td>
                            <td>{{number_format(($proveedor->promedio_calificacion),1)}}</td>

                            <td class="tabla__opcion">
                                <a href="./verProducto">
                                    <img src="{{asset('assets/icons/visualizar.png')}}" alt="Visualizar">
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <img class='calendario' src="{{asset('assets/img/calendario.png')}}" alt="">
        </div>
    </div>
</div>
</div>
<!-- -------------------Modal de agregar------------------ -->
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <img src="{{asset('assets/icons/lupa.png')}}" alt="">
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
                    <input class="btn" type="button" value="Agregar producto">
                </div>
                <img class="product" src="{{asset('assets/img/galeria 2.png')}}" alt="Postre">
            </div>
        </div>
    </div>
</div>

@endsection
