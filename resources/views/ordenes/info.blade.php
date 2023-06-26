<!-- -------------------Modal de agregar------------------ -->
<div class="modal fade bd-example-modal-xl" id="edit{{$proveedor->id_proveedor}}" tabindex="-1" role="dialog"
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
                <form class="modalProductos__contenidos" action="{{ route('visualizar.update', $proveedor->id_proveedor) }}" 
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modalProductos__campos">
                        <label class="label" for="">Identificación</label>
                        <input disabled name="id_Proveedor" type="text" placeholder="Nombre del producto" required value="{{$miproveedor->id_Proveedor}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Estado</label>
                        <input name="estado_Proveedor" type="text" placeholder="Nombre del producto" required value="{{$miproveedor->estado_Proveedor}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Empresa</label>
                        <input name="empresa_Proveedor" type="text" placeholder="Nombre del producto" required value="{{$miproveedor->empresa_Proveedor}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Nombre</label>
                        <input name="nombre_Proveedor" type="text" placeholder="Nombre del producto" required value="{{$miproveedor->nombre_Proveedor}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Correo</label>
                        <input name="correo_Proveedor" type="text" placeholder="Nombre del producto" required value="{{$miproveedor->correo_Proveedor}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Nit</label>
                        <input name="nit_Proveedor" type="text" placeholder="Nombre del producto" required value="{{$miproveedor->nit_Proveedor}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Celular</label>
                        <input name="celular_Proveedor" type="text" placeholder="Nombre del producto" required value="{{$miproveedor->celular_Proveedor}}">
                    </div>
                    <div class="modalProductos__campos">
                        <label class="label" for="">Celular respaldo</label>
                        <input name="celular_respaldo_Proveedor" type="text" placeholder="Nombre del producto" value="{{$miproveedor->celular_respaldo_Proveedor}}">
                    </div>
                    <button class="btn" type="submit">Editar proveedor</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-xl" id="delete{{$proveedor->id_proveedor}}" tabindex="-1" role="dialog"
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
                <form class="modalProductos__contenidos" action="{{ route('visualizar.destroy', $proveedor->id_proveedor) }}" 
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <p>
                        Esta seguro que desea eliminar a el proveedor 
                        <strong>{{$proveedor->empresa_proveedor}}</strong>
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

