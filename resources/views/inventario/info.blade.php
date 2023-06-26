<!-- -------------------Modal de agregar------------------ -->
<div class="modal fade bd-example-modal-xl" id="edit{{$miinsumo->id_Insumo}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Editar Proveedor</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modalProductos__contenidos" action="{{ route('visualizarinventario.update',$miinsumo->id_Insumo) }}" 
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modalProductos__campos">
                        <label class="label" for="">Identificación</label>
                        <input disabled name="id_Insumo" type="text" placeholder="Identificación" required value="{{$miinsumo->id_Insumo}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Insumo</label>
                        <input name="nombre_Insumo" type="text" placeholder="Nombre insumo" required value="{{$miinsumo->nombre_Insumo}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Estado</label>
                        <input name="id_Estado_FK" type="text" placeholder="Estado insumo" required value="{{$miinsumo->id_Estado_FK}}">
                    </div>
                    <button class="btn" type="submit">Editar Insumo</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-xl" id="delete{{$miinsumo->id_Insumo}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modalProductos__contenidos" action="{{ route('visualizarinventario.destroy', $miinsumo->id_Insumo) }}" 
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <p>
                        Esta seguro que desea eliminar el insumo 
                        <strong>{{$miinsumo->nombre_Insumo}}</strong>
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                            Cancelar
                        </button>
                        <button class="btn btn-danger" type="submit">Eliminar proveedor</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

