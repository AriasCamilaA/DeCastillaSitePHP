@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/tablas.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/botones.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/modalForms.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/tab_tabla.css')}}">
<!-- ---------------------------------------------Contenido----------------------------------------- -->
<div class="contenido">
    <h1>Inventario</h1>
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
        
        <a href="{{route('inventario.pdf')}}">
                    {{__('PDF')}}
        
        </a>
    </div>

    <div class="tablaConTab">
        <div>
            <button class="tablink bg-oscuro" onclick="openCity(event,'Insumos')">Insumos</button>
            <button class="tablink" onclick="openCity(event,'Productos')">Productos</button>
        </div>
        <div id="Insumos" class="tab_content">
            <div class="tabla">
                <table class="table table-hover table-striped" id="datos">
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
                            @foreach($vw_inventario_insumo as $insumo)
                            <?php $miinsumo = \App\Models\Insumo::find($insumo->ID); ?>
                            <th>{{$insumo->ID}}</th>
                            <td>{{$insumo->INSUMO}}</td>
                            <td>{{$insumo->ENTRADAS}}</td>
                            <td>{{$insumo->SALIDAS}}</td>
                            <td>{{$insumo->STOCK}}</td>
                            <td class="tabla__opcion">
                                <img src="{{asset('assets/icons/editar.png')}}" alt="Editar" data-toggle="modal"
                                    data-target="#edit{{$miinsumo->id_Insumo}}">
                                <img src="{{asset('assets/icons/borrar.png')}}" alt="Editar" data-toggle="modal"
                                    data-target="#delete{{$miinsumo->id_Insumo}}">
                            </td>
                        </tr>
                        @include('inventario.info')
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include("inventario/create")
        </div>

        <div id="Productos" class="tab_content" style="display:none">
            {{-- ------------------------------------tabla productos --}}
        </div>
    </div>
</div>
</div>
</div>
<script src="{{asset('assets/js/tab_tabla.js')}}"></script>
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
