<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioProducto extends Model
{
    use HasFactory;
    protected $table = 'Inventarioproducto';
    protected $primaryKey = 'id_InventarioProducto';

    protected $fillable = [
        'id_InventarioProducto',
        'stock_InventarioProducto',
        'id_Producto_FK',

    ];
}
