<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_datosventa extends Model
{
    use HasFactory;
    protected $table = 'vw_datosventa';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'ID',
        'FECHA',
        'HORA',
        'TOTAL',
        'VENDEDOR',
    ];
    




}
