<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'Pedido';
    protected $primaryKey = 'id_Pedido';

    protected $fillable = [
        'id_Pedido',
        'descripcion_Pedido',
        'fecha_Pedido',
        'id_EstadoPedido_FK',
        'id_Cliente_FK',
        'id_Venta_FK',
    ];
}
