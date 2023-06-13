@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset("assets/css/agregarTipoCarrito.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">

        <!-- ---------------------------------------------Contenido----------------------------------------- -->
        <div class="contenido">
            <div class="catalogo">
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
                <div class="card catalogo__producto">
                    <img class="card-img-top" src="{{asset("assets/img/galeria 1.png")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$5000</li>
                        <li class="list-group-item">Existencias: 10</li>
                        <li class="list-group-item">
                            <a href="#" class="btn">Agregar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="carrito">
                <h2>Pedido</h2>
                <div class="carrito__productos carrito__productos-especial">
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
                    <div class="carrito__producto">
                        <img src="{{asset("assets/img/galeria 3.png")}}" alt="">
                        <div class="producto__descripcion">
                            <h5>Producto</h5>
                            <p>$5000</p>
                        </div>
                        <input type="number" name="" id="" value="2">
                    </div>
                </div>
                <div class="carrito__opciones">
                    <textarea name="" id="" cols="30" rows="4"></textarea>
                    <input type="date" name="" id="">
                    <div class="carrito__total">
                        <p>Total: $</p>
                        <input type="number" value="10000">
                    </div>
                    <a href="#" class="btn">Realizar Pedido</a>
                </div>
            </div>
        </div>
    </div>
@endsection
