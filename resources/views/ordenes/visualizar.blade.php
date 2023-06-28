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
                    <input type="text" onkeyup="doSearch()" id="searchTerm">
                    <img src="{{asset('assets/icons/agregar.png')}}" alt="" data-toggle="modal"
                        data-target="#create">
                </div>

                <img src="{{asset('assets/icons/excel.png')}}" alt="">
                <a href="{{route('ordenes.pdf')}}">
                    {{__('PDF')}}
                </a>
            </div>
            <div class="tabla">
                <table class="table table-hover table-striped" id="datos">
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
                                <img src="{{asset('assets/icons/editar.png')}}" alt="Editar" data-toggle="modal"
                                    data-target="#edit{{$proveedor->id_proveedor}}">
                                <img src="{{asset('assets/icons/borrar.png')}}" alt="Editar" data-toggle="modal"
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