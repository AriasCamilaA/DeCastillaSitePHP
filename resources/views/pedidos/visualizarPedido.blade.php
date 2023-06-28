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

    <link rel="stylesheet" href="{{asset('assets/css/tablas.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/botones.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tab_tabla.css')}}">
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
              <img src="{{asset('assets/icons/lupa.png')}}" alt="">
              <input type="text" onkeyup="doSearch()" id="searchTerm">
              <img src="{{asset('assets/icons/agregar.png')}}" alt="" data-toggle="modal" data-target="#create">
            </div>
            <div class="filtros__fecha">
              <input type="date" name="" id="">
              <input type="date" name="" id="">
            </div>
            <img src="{{asset('assets/icons/excel.png')}}" alt="">
            <a href="{{route('pedidos.pdf')}}">
                    {{__('PDF')}}
            </a>
          </div>
  
          <div class="tablaConTab">
            <div>
              <button class="tablink bg-oscuro" onclick="openCity(event,'Pendientes')">Pendientes</button>
              <button class="tablink" onclick="openCity(event,'Finalizados')">Finalizados</button>
            </div>
            
            <div id="Pendientes" class="tab_content">
              <div class="tabla">
                <table class="table table-hover" id="datos">
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
                                <img src="{{asset('assets/icons/visualizar.png')}}" alt="Visualizar">
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
                                <img src="{{asset('assets/icons/visualizar.png')}}" alt="Visualizar">
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

    <script>
      function doSearch()

      {

          const tableReg = document.getElementById('datos');

          const searchText = document.getElementById('searchTerm').value.toLowerCase();

          let total = 0;



          // Recorremos todas las filas con contenido de la tabla

          for (let i = 1; i < tableReg.rows.length; i++) {

              // Si el td tiene la clase "noSearch" no se busca en su cntenido

              if (tableReg.rows[i].classList.contains("noSearch")) {

                  continue;

              }



              let found = false;

              const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

              // Recorremos todas las celdas

              for (let j = 0; j < cellsOfRow.length && !found; j++) {

                  const compareWith = cellsOfRow[j].innerHTML.toLowerCase();

                  // Buscamos el texto en el contenido de la celda

                  if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {

                      found = true;

                      total++;

                  }

              }

              if (found) {

                  tableReg.rows[i].style.display = '';

              } else {

                  // si no ha encontrado ninguna coincidencia, esconde la

                  // fila de la tabla

                  tableReg.rows[i].style.display = 'none';

              }

          }



          // mostramos las coincidencias

          const lastTR=tableReg.rows[tableReg.rows.length-1];

          const td=lastTR.querySelector("td");

          lastTR.classList.remove("hide", "red");

          if (searchText == "") {

              lastTR.classList.add("hide");

          } else if (total) {

              td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");

          } else {

              lastTR.classList.add("red");

              td.innerHTML="No se han encontrado coincidencias";

          }

      }
    </script>