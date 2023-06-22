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
                        data-target="#create">
                </div>

                <img src="{{asset('assets/icons/excel.png')}}" alt="">
                <a href="{{route('ordenes.pdf')}}">
                    {{__('PDF')}}
                </a>
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
                        <?php $miproveedor = \App\Models\Proveedor::find($proveedor->id_proveedor); ?>

                        <tr>
                            <th>{{$proveedor->id_proveedor}}</th>
                            <td>{{$proveedor->empresa_proveedor}}</td>
                            <td>{{number_format(($proveedor->promedio_calificacion),1)}}</td>

                            <td class="tabla__opcion">
                                <img src="{{asset('assets/icons/visualizar.png')}}" alt="Editar" data-toggle="modal"
                                    data-target="#edit{{$proveedor->id_proveedor}}">
                                <img src="{{asset('assets/icons/visualizar.png')}}" alt="Editar" data-toggle="modal"
                                    data-target="#delete{{$proveedor->id_proveedor}}">
                            </td>
                        </tr>
                        @include("ordenes/info")
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('ordenes/create')
        </div>
        <div>
            <img class='calendario' src="{{asset('assets/img/calendario.png')}}" alt="">
        </div>
    </div>
</div>
</div>