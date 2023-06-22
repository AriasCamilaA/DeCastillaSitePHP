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
              <img src="{{asset("assets/icons/agregar.png")}}" alt="" data-toggle="modal" data-target="#exampleModal">
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
      <script src="{{asset('assets/js/tab_tabla.js')}}"></script>
      @endsection
