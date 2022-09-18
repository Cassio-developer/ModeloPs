<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
{
    $this->middleware(['AdmSistema' OR 'AdmTI']);
    
   
}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    


public function index() {

    $user=Auth::user();

    return view('auth/register', compact('user'));
}
/**
 * Get a validator for an incoming registration request.
 *
 * @param  array  $data
 * @return \Illuminate\Contracts\Validation\Validator
 */protected function validator(array $data)
 {
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'cpf' => ['required', 'string', 'cpf', 'unique:users'],
    ],

[
    'name.required' => 'Nome é obrigatório',
    'name.string' => 'Somente letras',
    'name.max' => 'Máximo 255 caracteres',
    'email.required' => 'Email é obrigatório',
    'email.email' => 'Formato errado',
    'email.max' => 'Máximo 255 caracteres',

    'email.unique' => 'E-mail já cadastrado',
    'cpf.required' => 'CPF é obrigatório',
    'cpf.max' => 'Máximo 14 numeros',
    'cpf.unique' => 'CPF já cadastrado',
    'cpf.cpf' => 'CPF inválido',
    'password.required' => 'Senha é obrigatório',
    'password.min' => 'Minimo 8 caracteres',
    'password.confirmed' => 'Senhas precisam ser iguais',
] //regras da validação de criação usuario 
);
}

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return \App\User
 */
protected function create(array $data)
{
    

    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'cpf' => $data['cpf'],
        'password' => Hash::make($data['password']),
    ]);
}


}
