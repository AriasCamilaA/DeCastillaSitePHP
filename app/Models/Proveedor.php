<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedor';
    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'id_Proveedor',
        'estado_Proveedor',
        'empresa_Proveedor',
        'nombre_Proveedor',
        'correo_Proveedor',
        'nit_Proveedor',
        'celular_Proveedor',
        'celular_respaldo_Proveedor',
    ];
}
