<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'noDocumento_Usuario' => ['required', 'max:10'],
            'email' => ['required', 'email', 'max:45', 'unique:usuario,email'],
            'celular_Usuario' => ['required', 'max:10'],
            'nombre_Usuario1' => ['required', 'max:12'],
            'nombre_Usuario2' => ['max:12'],
            'apellido_Usuario1' => ['required', 'max:18'],
            'apellido_Usuario2' => ['max:17'],
            'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

    }

    protected function create(array $data)
    {
        return User::create([
            'noDocumento_Usuario' => $data['noDocumento_Usuario'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'celular_Usuario' => $data['celular_Usuario'],
            'nombre_Usuario' => $data['nombre_Usuario1'] . ' ' . $data['nombre_Usuario2'],
            'apellido_Usuario' => $data['apellido_Usuario1'] . ' ' . $data['apellido_Usuario2'],
            'id_Rol_FK' => 2,
            'estado' => 1,
        ]);
    }
}
