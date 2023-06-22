<!-- -------------------Modal de agregar------------------ -->
<div class="modal fade bd-example-modal-xl" id="create" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Agregar Insumo</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modalProductos__contenidos" action="{{route('visualizar.store')}}" method="POST" enctype="multipart/from-data">
                    @csrf
                    <div class="modalProductos__campos">
                        <label class="label" for="">Identificación</label>
                        <input name="id_Insumo" type="text" placeholder="Id del insumo" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Nombre Insumo</label>
                        <input name="nombre_Insumo" type="text" placeholder="Nombre del Insumo" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Estado Insumo</label>
                        <input name="id_Estado_FK" type="text" placeholder="Nombre del producto" required>
                    </div>
                    <input class="btn" type="submit" value="Agregar Insumo">
                </form>
            </div>
        </div>
    </div>
</div>