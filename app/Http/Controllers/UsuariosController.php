<?php

namespace App\Http\Controllers;
use App\User;
use Redirect;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $usuarios = User::get();
        return view('usuarios.list', ['usuarios' => $usuarios]);
    
    }

    public function new(){



        return view('usuarios.form');
    }

    public function add(Request $request){

        $usuario = new User;
        $usuario = $usuario->create($request->all() );
       
        return Redirect::to('/usuarios');
    }
    public function edit($id){

        $usuario = User::findOrFail($id);
       
       
        return   view('usuarios.form', ['usuario' => $usuario]);
    }
}


