@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/tablas.css')}}">

    <!-- ---------------------------------------------Contenido----------------------------------------- -->
    <div class="contenido">
        <h1>Ventas</h1>
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
            <a href="{{route('ventas.pdf')}}">
                    {{__('PDF')}}
            </a>
        </div>
        <div class="tabla">
            <table class="table table-hover table-striped" id="datos">
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
        @include("ventas/create")
    </div>
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
@endsection

