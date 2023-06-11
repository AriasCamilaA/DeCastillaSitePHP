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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'noDocumento_Usuario' => ['required'],
            'correo_Usuario' => ['required'],
            'pasword_Usuario' => ['required'],
            'celular_Usuario' => ['required'],
            'nombre_Usuario1' => ['required'],
            'nombre_Usuario2' => ['required'],
            'apellido_Usuario1' => ['required'],
            'apellido_Usuario2' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'noDocumento_Usuario' => $data['noDocumento_Usuario'],
            'correo_Usuario' => $data['correo_Usuario'],
            'pasword_Usuario' => Hash::make($data['pasword_Usuario']),
            'celular_Usuario' => $data['celular_Usuario'],
            'nombre_Usuario' => $data['nombre_Usuario1'] . ' ' . $data['nombre_Usuario2'],
            'apellido_Usuario' => $data['apellido_Usuario1'] . ' ' . $data['apellido_Usuario2'],
            'id_Rol_FK' => 2,
        ]);
    }
}
