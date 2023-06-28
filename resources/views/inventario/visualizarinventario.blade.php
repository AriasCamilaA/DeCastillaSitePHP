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
            <input type="text">
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
@endsection
