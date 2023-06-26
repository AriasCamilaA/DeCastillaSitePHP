<!-- -------------------Modal de agregar------------------ -->
<div class="modal fade bd-example-modal-xl" id="create" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modalProductos__contenidos" action="{{route('visualizar.store')}}" method="POST" enctype="multipart/from-data">
                    @csrf
                    <div class="modalProductos__campos">
                        <label class="label" for="">Empresa</label>
                        <input name="empresa_Proveedor" type="text" placeholder="Nombre del producto" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Nombre</label>
                        <input name="nombre_Proveedor" type="text" placeholder="Nombre del producto" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Correo</label>
                        <input name="correo_Proveedor" type="text" placeholder="Nombre del producto" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Nit</label>
                        <input name="nit_Proveedor" type="text" placeholder="Nombre del producto" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Celular</label>
                        <input name="celular_Proveedor" type="text" placeholder="Nombre del producto" required>
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Celular respaldo</label>
                        <input name="celular_respaldo_Proveedor" type="text" placeholder="Nombre del producto" required>
                    </div>
                    <input class="btn" type="submit" value="Agregar proveedor">
                </form>
            </div>
        </div>
    </div>
</div>