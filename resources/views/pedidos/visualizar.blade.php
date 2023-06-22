@extends('layouts.app')

@section('content')

@php
    $estados = [
        'Por Aprobar' => 'porAprobar',
        'Aprobado' => 'aprobado',
        'Preparándose' => 'preparandose',
        'Para Recoger' => 'paraRecoger',
        'Cancelado' => 'cancelados',
        'Aceptar Cambios' => 'aceptarCambios',
        'Finalizados' => 'finalizados'
    ];
@endphp

    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/tab_tabla.css")}}">
        <!-- ---------------------------------------------Contenido----------------------------------------- -->
        <div class="contenido">
          <h1>Pedidos</h1>
          <div class="opciones">
            @foreach($estados as $key => $value)
              <input type="radio" name="rd_Estado" id="rd_btn-{{ $value }}" class="btn-{{ $value }}">
              <label for="rd_btn-{{ $value }}" class="lbl_Estado btn-{{ $value }}">{{ $key }}</label>
            @endforeach
          </div>
          <div class="filtros">
            <div>
              <img src="{{asset("assets/icons/lupa.png")}}" alt="">
              <input type="text">
              <img src="{{asset("assets/icons/agregar.png")}}" alt="" data-toggle="modal" data-target="#create">
            </div>
            <div class="filtros__fecha">
              <input type="date" name="" id="">
              <input type="date" name="" id="">
            </div>
            <img src="{{asset("assets/icons/excel.png")}}" alt="">
          </div>
  
          <div class="tablaConTab">
            <div>
              <button class="tablink bg-oscuro" onclick="openCity(event,'Pendientes')">Pendientes</button>
              <button class="tablink" onclick="openCity(event,'Finalizados')">Finalizados</button>
            </div>
            
            <div id="Pendientes" class="tab_content">
              <div class="tabla">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Dodumento</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Cliente</th>
                        <th class="tabla__estado" scope="col">Estado</th>
                        <th class="tabla__opcion" scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos_no_finalizados as $pedido)
                    <tr>
                        <th>{{$pedido->ID_PEDIDO}}</th>
                        <td>{{$pedido->DESCRIPCION}}</td>
                        <td>{{$pedido->FECHA}}</td>
                        <td>{{$pedido->DOC_USUARIO}}</td>
                        <td>{{$pedido->CELULAR}}</td>
                        <td>{{$pedido->CLIENTE}}</td>
                        <td class="tabla__estado">
                            @if(isset($estados[$pedido->ESTADO]))
                                <span class="lbl_Estado btn-{{ $estados[$pedido->ESTADO] }}">{{ $pedido->ESTADO }}</span>
                            @endif
                        </td>
                        <td class="tabla__opcion">
                            <a href="./verPedido">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            </div>
          
            <div id="Finalizados" class="tab_content" style="display:none">
              <div class="tabla">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Dodumento</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Cliente</th>
                        <th class="tabla__estado" scope="col">Estado</th>
                        <th class="tabla__opcion" scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos_finalizados as $pedido)
                    <tr>
                        <th>{{$pedido->ID_PEDIDO}}</th>
                        <td>{{$pedido->DESCRIPCION}}</td>
                        <td>{{$pedido->FECHA}}</td>
                        <td>{{$pedido->DOC_USUARIO}}</td>
                        <td>{{$pedido->CELULAR}}</td>
                        <td>{{$pedido->CLIENTE}}</td>
                        <td class="tabla__estado">
                            @if(isset($estados[$pedido->ESTADO]))
                                <span class="lbl_Estado btn-{{ $estados[$pedido->ESTADO] }}">{{ $pedido->ESTADO }}</span>
                            @endif
                        </td>
                        <td class="tabla__opcion">
                            <a href="./verPedido">
                                <img src="{{asset("assets/icons/visualizar.png")}}" alt="Visualizar">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            </div>
          </div>
    </div>
    <script src="{{asset('assets/js/tab_tabla.js')}}"></script>
    @include('pedidos.create')
    @endsection