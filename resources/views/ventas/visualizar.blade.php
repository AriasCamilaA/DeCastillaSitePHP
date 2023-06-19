@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">

    <!-- ---------------------------------------------Contenido----------------------------------------- -->
    <div class="contenido">
        <h1>Ventas</h1>
        <div class="filtros">
            <div>
                <img src="{{asset("assets/icons/lupa.png")}}" alt="">
                <input type="text">
                <a href="./nuevaVenta">
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
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Total</th>
                    <th scope="col">Vendedor</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($ventas as $venta)
                    <th>{{$venta->ID}}</th>
                    <td>{{\Carbon\Carbon::parse($venta->FECHA)->format('d-m-Y')}}</td>
                    <td>{{$venta->HORA}}</td>
                    <td>${{number_format(($venta->TOTAL), 2, ',', '.')}}</td>
                    <td>{{$venta->VENDEDOR}}</td>
                    <td class="tabla__opcion">
                        <a href="./verVenta">
                            <img src="{{asset('assets/icons/visualizar.png')}}" alt="Visualizar">
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
@endsection
