<?php

namespace App\Http\Controllers;
use App\Cadastropessoass;  //CUIDAR COLOQUEI O MODEL EM CIMA NAMESPACE DEU ERRO!!
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

class CadastropessoassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {          
        $sexo=[
            '1' => 'masculino',
            '2' => 'feminino',
        ];


          //variavel botão  
        $search = request('search');
// variaveis que serão procuradas
        $cadastropessoass = Cadastropessoass::where('nome', 'LIKE', '%' . $search . '%')
                            //nome Controller
               //aqui vamos realizar a busca do campo de pesquisa index             
            ->orWhere('endereco', 'LIKE', '%' . $search . '%')
            ->orWhere('cidade', 'LIKE', '%' . $search . '%')
            ->orWhere('telefone', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('cpf', 'LIKE', '%' . $search . '%')
            ->orWhere('bairro', 'LIKE', '%' . $search . '%')
            ->orWhere('sexo', 'LIKE', '%' . $search . '%')
            ->orWhere('datanascimento', 'LIKE', '%' . $search . '%')
            ->orWhere('complemento', 'LIKE', '%' . $search . '%')
            ->paginate(50);
        // cuidar a paginação default 10   
        //paginação!
        //$cadastropessoass = Cadastropessoass::paginate(12);
                

               
               return view('cadastropessoasspasta.index',(['cadastropessoass','search'=>$search,"cadastropessoass"=>$cadastropessoass,'sexo' =>$sexo]));
        }                   //aqui colocar pasta.index      //compact variavel nome table
                               //cuidar !!!                     
       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        
        if(!session()->has('redirect_to'))
        {
           session(['redirect_to' => url()->previous()]);
        }
    return view('cadastropessoasspasta.create', [('cadastropessoass.store'), 'method'=>'post']);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request )
{
    //                                           //pasta
    $url = $request->get('redirect_to', route('cadastropessoass.index'));
    if (! $request->has('cancel') ){
        $dados = $request->all();
        Cadastropessoass::create($dados);
        $request->session()->flash('message', ' Cadastrado com sucesso');
    }
    else
    { 
        $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
    }
    return redirect()->to(session()->pull('redirect_to'));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */            //aqui vai nome model Cadastropessoass
    public function update(Cadastropessoass $cadastropessoass, StoreUpdateUserFormRequest $request)
    {
        if (! $request->has('cancel') ){
            $cadastropessoass->nome = $request->input('nome');
            $cadastropessoass->endereco = $request->input('endereco'); 
            $cadastropessoass->cidade = $request->input('cidade');
            $cadastropessoass->telefone = $request->input('telefone');
            $cadastropessoass->email = $request->input('email');
            $cadastropessoass->cpf = $request->input('cpf');
            $cadastropessoass->bairro = $request->input('bairro');
            $cadastropessoass->sexo = $request->input('sexo');
            $cadastropessoass->complemento = $request->input('complemento');
            $cadastropessoass->datanascimento = $request->input('datanascimento');
            $cadastropessoass->update();
            \Session::flash('message', 'Cadastro atualizado com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(session()->pull('redirect_to'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Cadastropessoass $cadastropessoass, Request $request)
    {                                        //passar aqui partametro delete da route exibido php artisan route:list
        //
        if (! $request->has('cancel') ){
            $cadastropessoass->delete();
            //passar aqui partametro delete da route exibido php artisan route:list $cadastropessoass
            \Session::flash('message', 'Equipamento excluído com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(session()->pull('redirect_to')); 
    }                            //pasta
}