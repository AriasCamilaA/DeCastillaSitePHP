@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset("assets/css/verPedido.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
        <!-- ---------------------------------------------Contenido----------------------------------------- -->
        <div class="contenido">
            <div class="verPedido">
                <div class="verPedido__cabecera">
                    <div>
                        <h1>Pedido</h1>
                        <p>Nombre Cliente</p>
                    </div>
                    <span class="lbl_Estado btn-aceptarCambios">Estado</span>
                </div>
                <div class="verPedido__Cuerpo">
                    <div class="carrito__producto">
                        <img src="{{asset("assets/img/galeria 3.png")}}" alt="">
                        <div class="producto__descripcion">
                            <h5>Producto</h5>
                            <p>$5000</p>
                        </div>
                        <input type="number" name="" id="" value="2">
                    </div>
                    <div class="carrito__producto">
                        <img src="{{asset("assets/img/galeria 3.png")}}" alt="">
                        <div class="producto__descripcion">
                            <h5>Producto</h5>
                            <p>$5000</p>
                        </div>
                        <input type="number" name="" id="" value="2">
                    </div>
                </div>
                <div class="verPedido__footer">
                    <textarea name="" id="" cols="30" rows="4"  >Quiero que no tenga tanta azúcar</textarea>
                    <input type="date" name="" id=""  >
                    <div class="carrito__total">
                        <p>Total: $</p>
                        <input type="number" value="10000"  >
                    </div>
                    <div class="botones">
                        <a href="./visualizar" class="btn btn-porAprobar">Guardar</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
