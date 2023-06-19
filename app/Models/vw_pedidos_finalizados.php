<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_pedidos_finalizados extends Model
{
    use HasFactory;
    protected $table = 'vw_pedidos_finalizados';
    protected $primaryKey = 'ID_PEDIDO';

    protected $fillable = [
        'ID_PEDIDO',
        'DESCRIPCION',
        'FECHA',
        'ESTADO',
        'DOC_USUARIO',
        'CELULAR',
        'CLIENTE',
    ];
}
