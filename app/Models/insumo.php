<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insumo extends Model
{
    use HasFactory;
    protected $table = 'Insumo';
    protected $primaryKey = 'id_Insumo';

    protected $fillable = [
        'id_Insumo',
        'nombre_Insumo',
        'id_Estado_FK',
    ];
    protected $guarded = [];
    public $timestamps = false;
}
