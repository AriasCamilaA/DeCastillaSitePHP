    <!-- -------------------Modal de agregar------------------ -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @foreach($productos as $producto)
            <div class="modal-body">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset("assets/img/galeria 1.png")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$producto->nombre_Producto}}</h5>
                    <p class="card-title">{{$producto->precio_Producto}}</p>
                    <a href="#" class="btn">Agregar</a>
                    </div>
                  </div>
            </div>
            @endforeach
            <div class="carrito">
                
            </div>
          </div>
        </div>
      </div>


