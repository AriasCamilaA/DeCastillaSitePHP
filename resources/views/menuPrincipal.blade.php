@extends('layouts.app')

@section('content')
    <!-- ---------------------------------------------Contenido----------------------------------------- -->
    <div class="contenido">
        <h1>Menú Administrador</h1>
        <div class="opciones menuAdmin">
            <div class="btn_opciones">
                <a href="ventas/visualizar">
                    <img src="{{asset('assets/icons/ventas.png')}}" alt="">
                </a>
                <h2>Ventas</h2>
            </div>
            <div class="btn_opciones">
                <a href="inventario/visualizar">
                    <img src="{{asset('assets/icons/Inventario.png')}}" alt="">
                </a>
                <h2>Inventario</h2>
            </div>
            <div class="btn_opciones">
                <a href="ordenes/visualizar">
                    <img src="{{asset('assets/icons/Proveedores.png')}}" alt="">
                </a>
                <h2>Proveedores</h2>
            </div>
            <div class="btn_opciones">
                <a href="pedidos/visualizar">
                    <img src="{{asset('assets/icons/Pedidos.png')}}" alt="">
                </a>
                <h2>Pedidos</h2>
            </div>
            <div class="btn_opciones">
                <a href="#">
                    <img src="{{asset('assets/icons/Configuracion.png')}}" alt="">
                </a>
                <h2>Configuración</h2>
            </div>

        </div>
    </div>
@endsection
