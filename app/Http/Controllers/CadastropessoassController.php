<?php

namespace App\Http\Controllers;
use PDF;
use App\Cadastropessoass; 
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Support\Facades\Validator;

class CadastropessoassController extends Controller
{
   
    public function index()
    {   

        $search = request('search');
        $cadastropessoass = Cadastropessoass::where('nome', 'LIKE', '%' . $search . '%')         
            ->orWhere('endereco', 'LIKE', '%' . $search . '%')
            ->orWhere('cidade', 'LIKE', '%' . $search . '%')
            ->orWhere('telefone', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('cpf', 'LIKE', '%' . $search . '%')
            ->orWhere('bairro', 'LIKE', '%' . $search . '%')
            ->orWhere('sexo', 'LIKE', '%' . $search . '%')
            ->orWhere('datanascimento', 'LIKE', '%' . $search . '%')
            ->orWhere('complemento', 'LIKE', '%' . $search . '%')->get();
       
               return view('cadastropessoasspasta.index',(['cadastropessoass','search'=>$search,"cadastropessoass"=>$cadastropessoass]));
        }                                    
       

    
    public function create()
    {        
        
        if(!session()->has('redirect_to'))
        {
           session(['redirect_to' => url()->previous()]);
        }
    return view('cadastropessoasspasta.create', [('cadastropessoass.store'), 'method'=>'post']);
}

    public function store(StoreUpdateUserFormRequest $request )
{
    
    
    $this->validate($request, [
        
            'cpf' => 'required|cpf',
      
    ]);
    $validator = Validator::make($request->all(), [
        'nome' => ['required'],
        'datanascimento' => ['required'],
        'cpf' => ['required', 'unique:cadastropessoass', 'cpf'],
        'sexo' => ['required'],


    ], [
        'cpf.cpf' => 'CPF inválido',
        'cpf.unique' => 'CPF ja cadastrado.',
        'nome.required' => 'O campo nome é obrigatório',
        'datanascimento.required' => 'O campo data de nascimento é obrigatório',
        'sexo.required' => 'O campo sexo é obrigatório',
    ]);

    if ($validator->fails()) {
        return redirect('cadastropessoass')
            ->withErrors($validator)
            ->withInput();
    }

    $url = $request->get('redirect_to', route('cadastropessoass.index'));
    if (! $request->has('cancel') ){
        $dados = $request->all();
        Cadastropessoass::create($dados);
        $request->session()->flash('message', ' Cadastrado com Sucesso');
        \Session::flash('message',"Cadastrado com sucesso!");
    
    }else
    { 
        $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
    }


       return redirect('/cadastropessoass')->with('success', 'Protocolo cadastrado com sucesso!');
    }
   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
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

    

    public function destroy(Cadastropessoass $cadastropessoass, Request $request)
    {                                       
        if (! $request->has('cancel') ){
            $cadastropessoass->delete();
            \Session::flash('message', 'Cadastro  excluído com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(session()->pull('redirect_to')); 
     }                          
}