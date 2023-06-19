<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'Venta';
    protected $primaryKey = 'id_Venta';

    protected $fillable = [
        'id_Venta',
        'fecha_Venta',
        'hora_venta',
        'total_Venta',
        'id_Administrador_FK',
        'id_Empleado_FK',
    ];
}
