<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $table = 'DetallePedido';
    protected $primaryKey = 'id_DetallePedido';

    protected $fillable = [
        'id_DetallePedido',
        'cantidad_producto',
        'subtotal_DetallePedido',
        'id_Producto_FK',
        'id_Venta_FK',
        'id_EstadoPedido_FK',
        'estado',
    ];
}
