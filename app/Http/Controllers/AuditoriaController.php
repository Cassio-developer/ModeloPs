<?php

namespace App\Http\Controllers;
use App\Audit;
use Illuminate\Http\Request;
use App\Cadastropessoass;
use App\Protos;
use App\Models\Flight;
class AuditoriaController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

  
       
        $usuarios = Audit::orderBy('old_values', 'desc')->get();

        $search = request('search');
        
          $usuarios = Audit::where('event', 'LIKE', '%' . $search . '%')      
              ->orWhere('user_type' , 'LIKE', '%' . $search . '%')
              ->orWhere('old_values', 'LIKE', '%' . $search . '%')
              ->orWhere('new_values', 'LIKE', '%' . $search . '%')
              ->orWhere('url', 'LIKE', '%' . $search . '%')
              ->orWhere('ip_address', 'LIKE', '%' . $search . '%')
              ->orWhere('user_agent', 'LIKE', '%' . $search . '%')
              ->orWhere('tags', 'LIKE', '%' . $search . '%')
              ->paginate(70);
              
        return view('auditoria.index', compact('usuarios', 'search'));
    
    }


    public function detalhamento($id){
       $usuarios = Audit::find($id);


      return   view('auditoria.form', compact('usuarios'));
  }

}


