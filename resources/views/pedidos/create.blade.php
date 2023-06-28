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
                          <h5 class="card-title nombre_Producto">{{$producto->nombre_Producto}}</h5>
                          <p class="card-title precio_Producto">$ {{number_format(($producto->precio_Producto), 0, ',', '.')}}</p>
                          <a href="#" class="btn agregar-producto" data-producto-id="{{$producto->id_Producto}}">Agregar</a> <!-- Agregar la clase "agregar-producto" al botón y el atributo de datos "data-producto-id" -->
                      </div>
                  </div>
                  @endforeach
                </div>
                <div class="carrito">
                  <h2 class="titulo">
                    Carrito
                  </h2>
                  <div class="carrito__productos">
                    <!-- Aquí se mostrarán los productos agregados al carrito -->
                  </div>
                  <div class="carrito__footer">
                    <h2>Total</h2>
                    <p id="total-precio">$0</p> <!-- Agrega un id para el elemento que mostrará el total del precio -->
                </div>                
                  <button class="btn" id="crear-pedido">Crear Pedido</button> <!-- Agregar un botón para crear el pedido -->
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> <!-- Actualizar a la última versión de jQuery -->
<script>
$(document).ready(function() {
  var productosAgregados = {}; // Objeto para almacenar los productos agregados al carrito

  $('.agregar-producto').click(function(e) {
    e.preventDefault();

    var productoId = $(this).data('producto-id');
    var nombre = $(this).siblings('.nombre_Producto').text();
    var precio = $(this).siblings('.precio_Producto').text().replace('$', '').replace('.', '');

    if (productosAgregados.hasOwnProperty(productoId)) {
      productosAgregados[productoId].cantidad += 1; // Aumentar la cantidad si el producto ya está en el carrito
    } else {
      productosAgregados[productoId] = { // Agregar el producto al carrito si es la primera vez
        nombre: nombre,
        precio: precio,
        cantidad: 1
      };
    }

    // Actualizar la vista del carrito con los productos agregados
    var html = '';
    for (var key in productosAgregados) {
      if (productosAgregados.hasOwnProperty(key)) {
        var producto = productosAgregados[key];
        html += '<div class="card" data-producto-id="' + key + '">' +
                  '<div class="card-body">' +
                    '<button class="btn btn-quitar">-</button>' +
                    '<div class="descripcion">' +
                      '<h5 class="card-title">' + producto.nombre + '</h5>' +
                      '<p class="card-title">$ ' + producto.precio + '</p>' +
                      '<span class="badge bg-secondary">' + producto.cantidad + '</span>' + // Agregar el span con la cantidad
                    '</div>' +
                    '<button class="btn btn-agregar">+</button>' +
                  '</div>' +
                '</div>';
      }
    }
    $('.carrito__productos').html(html);
    calcularTotal();
  });

  $('.carrito__productos').on('click', '.btn-agregar', function(e) {
  e.preventDefault();

  var card = $(this).closest('.card');
  var productoId = card.data('producto-id');
  var producto = productosAgregados[productoId];

  if (producto) {
    producto.cantidad += 1; // Aumentar la cantidad del producto en el carrito
    card.find('.badge').text(producto.cantidad); // Actualizar la cantidad en la vista

    calcularTotal();
  }
});

$('.carrito__productos').on('click', '.btn-quitar', function(e) {
  e.preventDefault();

  var card = $(this).closest('.card');
  var productoId = card.data('producto-id');
  var producto = productosAgregados[productoId];

  if (producto) {
    if (producto.cantidad > 1) {
      producto.cantidad -= 1; // Disminuir la cantidad del producto en el carrito si es mayor a 1
      card.find('.badge').text(producto.cantidad); // Actualizar la cantidad en la vista
    } else {
      delete productosAgregados[productoId]; // Eliminar el producto del carrito si la cantidad es 1
      card.remove(); // Eliminar la tarjeta del producto de la vista
    }

    calcularTotal();
  }
});

function calcularTotal() {
  var total = 0;

  for (var key in productosAgregados) {
    if (productosAgregados.hasOwnProperty(key)) {
      var producto = productosAgregados[key];
      var cantidad = producto.cantidad;
      var precio = parseInt(producto.precio);
      total += cantidad * precio;
    }
  }

  $('#total-precio').text('$ ' + total.toLocaleString()); // Actualizar el total en la vista
}


$('#crear-pedido').click(function() {
  var data = {
    descripcion: 'Descripción del pedido', // Obtén la descripción del pedido del formulario
    productos: productosAgregados
  };

  var csrfToken = $('meta[name="csrf-token"]').attr('content');

$.ajax({
  url: '{{ route('visualizarPedido.store') }}',
  method: 'POST',
  data: data,
  headers: {
    'X-CSRF-TOKEN': csrfToken
  },
  success: function(response) {
    console.log(response.message);
    productosAgregados = {};
    $('.carrito__productos').html('');
    // Cerrar el modal después de crear el pedido
    location.reload()
  },
  error: function(xhr) {
    console.log('ra mal' ,{{Auth::user()->noDocumento_Usuario}});
    // Manejar el error en caso de que ocurra
  }
});
});

});
</script>
