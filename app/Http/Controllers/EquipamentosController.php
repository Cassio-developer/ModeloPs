<?php

namespace App\Http\Controllers;
use App\Equipamento;
use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
 //nome que vamos passar
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos') );
 }                                         //compact variavel

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    //
    return view('equipamentos.create', ['action'=>route('CadastroPESSOAS.store'), 'method'=>'post']);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    //
    $url = $request->get('redirect_to', route('CadastroPESSOAS.index'));
    if (! $request->has('cancel') ){
        $dados = $request->all();
        Equipamento::create($dados);
        $request->session()->flash('message', ' cadastrado com sucesso');
    }
    else
    { 
        $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
    }
    return redirect()->to($url);
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
     */
    
    public function update(Equipamento $variavel, Request $request)
    {
        if (! $request->has('cancel') ){
            $variavel->nome = $request->input('nome');
            $variavel->endereco = $request->input('endereco'); 
            $variavel->cidade = $request->input('cidade');
            $variavel->telefone = $request->input('telefone');
            $variavel->email = $request->input('email');
            $variavel->cpf = $request->input('cpf');
            $variavel->bairro = $request->input('bairro');
            $variavel->datanascimento = $request->input('datanascimento');
            $variavel->update();
            \Session::flash('message', 'Cadastro atualizado com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->route('CadastroPESSOAS.index'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipamento $variavel, Request $request)
    {
        //
        if (! $request->has('cancel') ){
            $variavel->delete();
            \Session::flash('message', 'Equipamento excluído com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->route('CadastroPESSOAS.index'); 
    }

}