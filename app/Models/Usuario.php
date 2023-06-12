<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // Resto de la definición de tu modelo Usuario

    protected $table = 'Usuario';
    protected $primaryKey = 'noDocumento_Usuario';
    protected $fillable = [
        'noDocumento_Usuario',
        'correo_Usuario',
        'pasword_Usuario',
        'celular_Usuario',
        'nombre_Usuario',
        'apellido_Usuario',
        'id_Rol_FK'
    ];

    // Implementación de los métodos de la interfaz Authenticatable
    public function getAuthIdentifierName()
    {
        return 'noDocumento_Usuario'; // Cambia 'id' por el nombre de la columna de identificación en tu tabla
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->pasword_Usuario;
    }

    // Implementación de otros métodos necesarios de la interfaz Authenticatable
}
