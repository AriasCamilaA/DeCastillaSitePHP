<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioInsumo extends Model
{
    use HasFactory;
    protected $table = 'inventarioInsumo';
    protected $primaryKey = 'id_InventarioProducto';

    protected $fillable = [
        'id_InventarioProducto',
        'stock_InventarioProducto',
        'id_Producto_FK',
    ];

}
