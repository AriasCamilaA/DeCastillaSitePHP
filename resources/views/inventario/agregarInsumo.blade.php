@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset("assets/css/agregarTipoCarrito.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/forms.css")}}">
        <!-- ---------------------------------------------Contenido----------------------------------------- -->
        <div class="contenido">
            <form action="" class="form">
                <div>
                    <h1 class="form__title">Agregar Insumo</h1>
                </div class="form__contenido">
                    <div>
                    <div>
                        <label for="">Nombre</label>
                        <input type="text" placeholder="Nombre insumo">
                    </div>
                    <div>
                        <label for="">precio</label>
                        <input type="text" placeholder="precio insumo">
                    </div>
                    <div>
                        <botton class="btn">Agregar Insumo</botton>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
