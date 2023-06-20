<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_provedorescalificacionavg extends Model
{
    use HasFactory;
    protected $table = 'vw_provedorescalificacionavg';
    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'id_proveedor',
        'empresa_proveedor',
        'promedio_calificacion',
    ];
}
