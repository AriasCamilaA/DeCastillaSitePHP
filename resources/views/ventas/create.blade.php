<!-- -------------------Modal de agregar------------------ -->
<div class="modal fade bd-example-modal-xl" id="create" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Agregar Venta</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modalProductos__contenidos" action="{{route('visualizarVenta.store')}}" method="POST" enctype="multipart/from-data">
                    @csrf
                    <div class="modalProductos__campos">
                        <label class="label" for="">Total venta</label>
                        <input name="total_Venta" type="text" placeholder="Total Venta" required>
                    </div>
                    <input class="btn" type="submit" value="Agregar Insumo">
                </form>
            </div>
        </div>
    </div>
</div>