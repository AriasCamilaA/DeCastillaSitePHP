<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hola soy tu reporte</h1>

    <div class="tabla">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Calificaión</th>
                            <th class='tabla__opcion' scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                        <?php $miproveedor = \App\Models\Proveedor::find($proveedor->id_proveedor); ?>

                        <tr>
                            <th>{{$proveedor->id_proveedor}}</th>
                            <td>{{$proveedor->empresa_proveedor}}</td>
                            <td>{{number_format(($proveedor->promedio_calificacion),1)}}</td>


                        </tr>
                        @include("ordenes/info")
                        @endforeach
                    </tbody>
                </table>
            </div>
</body>
</html>