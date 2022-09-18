<?php

namespace App\Http\Controllers;
use App\User;
use Redirect;
use PDF;
use Illuminate\Foundation\Auth\RegistersUsers;

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
          //aciona adiconar new usuario
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


    public function delete($id)

    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios')->with('warning', ' excluido com sucesso!');;
    }                    

    public function update($id ,Request $request)
    {
        $usuario = User::findOrFail();
        $usuario ->update( $request->all() );
        return redirect('/usuarios')->with('warning', 'atualizado com sucesso!');
        }                    
        
}







