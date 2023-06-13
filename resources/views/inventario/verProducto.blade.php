@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset("assets/css/tablas.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/botones.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/modalForms.css")}}">

    <div class="verProducto" id="producto">
        <div class="verProducto" role="document">
          <div class="ver-producto">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">Ver Producto</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modalProductos__contenidos">
                    <h2>Categoría</h2>
                    <div class="modalProductos__campos">
                        <div class="label">
                            <img src="{{asset("assets/icons/lupa.png")}}" alt="">
                        </div>
                        <input type="text" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Nombre</label>
                        <input type="text" placeholder="producto vendido" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Precio</label>
                        <input type="number" placeholder="Precio del producto" required>
                    </div>
                    <input class="btn" type="button" value="Editar" >
                </div>
                <img class="product" src="{{asset("assets/img/galeria 3.png")}}" alt="Postre">
            </div>
          </div>
        </div>
     </div>
@endsection
