    <link rel="stylesheet" href="{{asset('assets/css/createPedidoVenta.css')}}">
    <!-- -------------------Modal de agregar------------------ -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="catalogo">
                      @foreach($productos as $producto)
                      <div class="card" style="width: 18rem;">
                          {{-- <img src="{{asset("assets/img/galeria 1.png")}}" class="card-img-top" alt="..."> --}}
                          <div class="card-body">
                              <h5 class="card-title">{{$producto->nombre_Producto}}</h5>
                              <p class="card-title">$ {{number_format(($producto->precio_Producto), 0, ',', '.')}}</p>
                              <a href="#" class="btn">Agregar</a>
                          </div>
                      </div>
                      @endforeach
                    </div>
                    <div class="carrito">
                      <h2 class="titulo">
                        Carrito
                      </h2>
                      <div class="carrito__productos">
                        @foreach($productos as $producto)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <button class="btn btn-productos">-</button>
                              <div class="descripcion">
                                <h5 class="card-title">{{$producto->nombre_Producto}}</h5>
                                <p class="card-title">$ {{number_format(($producto->precio_Producto), 0, ',', '.')}}</p>
                              </div>
                              <button class="btn btn-productos">+</button>
                            </div>
                        </div>
                        @endforeach
                      </div>
                      <div class="carrito__footer">
                        <h2>Total</h2>
                        <p>$50.000</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
