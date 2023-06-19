<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_inventario_insumo extends Model
{
    use HasFactory;
    protected $table = 'vw_inventario_insumo';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID',
        'INSUMO',
        'ENTRADAS',
        'SALIDAS',
        'STOCK',
    ];
}
