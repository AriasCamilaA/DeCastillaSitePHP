<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Estilos CSS para el documento PDF */

        .logo {
            width: 100px; /* Ajusta el tamaño del logo según tus necesidades */
            grid-column: 1; /* Ubica la imagen en la primera columna */
        }

        h3, p {
            margin: 0;
            line-height: 1.5; /* Ajusta el valor según tus necesidades */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Agrega margen inferior para separar las tablas */
        }

        th, td {
            border: 1px solid #333333;
            padding: 5px;
            text-align: center
        }

        .tabla__opcion {
            /* Agrega estilos adicionales para la columna de opciones si es necesario */
        }
    </style>
</head>
<body>
    <div style="margin-bottom: 20px;"> <!-- Agrega un margen entre las tablas -->
        <table class="table table-hover table-striped encabezado">
            <thead>
                <tr>
                    <th scope="col"><img class="logo" src="https://i.imgur.com/1BYQFQy.png" alt=""></th>
                    <td scope="col">
                        <h3>Repostería de Castilla</h3>
                        <p>Reporte generado por: {{ Auth::user()->nombre_Usuario }}</p>
                        <p>Fecha: {{ now() }}</p>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Empresa</th>
                <th scope="col">Calificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
            <?php $miproveedor = \App\Models\Proveedor::find($proveedor->id_proveedor); ?>

            <tr>
                <th>{{ $proveedor->id_proveedor }}</th>
                <td>{{ $proveedor->empresa_proveedor }}</td>
                <td>{{ number_format(($proveedor->promedio_calificacion), 1) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
