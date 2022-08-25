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
    }/* public function index(Request $request){

        var_dump($_POST);
        
        $usuarios = Audit::get();   */
    public function index(){

     //   var_dump($_POST);
        
        foreach (Audit::all() as $flight) {
            echo $flight->name;
      }
       
        $usuarios = Audit::orderBy('old_values', 'desc')->get();

        $search = request('search');
        //  if($search){
  // variaveis que serão procuradas               //coluna  //metodo //oquebuscar
          $usuarios = Audit::where('event', 'LIKE', '%' . $search . '%')
        
                              //nome Controller
                 //aqui vamos realizar a busca do campo de pesquisa index    
              ->orWhere('user_type' , 'LIKE', '%' . $search . '%')
              //->orWhere('auditable', 'LIKE', '%' . $search . '%')
              ->orWhere('old_values', 'LIKE', '%' . $search . '%')
              ->orWhere('new_values', 'LIKE', '%' . $search . '%')
              ->orWhere('url', 'LIKE', '%' . $search . '%')
              ->orWhere('ip_address', 'LIKE', '%' . $search . '%')
              ->orWhere('user_agent', 'LIKE', '%' . $search . '%')
              ->orWhere('tags', 'LIKE', '%' . $search . '%')
              ->paginate(50);
          // cuidar a paginação default 10                         
        return view('auditoria.index', compact('usuarios', 'search','flight'));
    
    }


    public function detalhamento($id){
        //metodo vai buscar o id se não encontrar vai parar findOrFail
       $usuarios = Audit::find($id);

       //$protocolo = Protos::find($id);

       //$pessoa = Cadastropessoass::all();


return   view('auditoria.form', compact('usuarios'));
}

}


