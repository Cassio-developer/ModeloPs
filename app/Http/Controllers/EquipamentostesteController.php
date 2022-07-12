<?php

namespace App\Http\Controllers;
use App\Equipamentoteste; //CUIDAR COLOQUEI O MODEL EM CIMA NAMESPACE DEU ERRO!!
use Illuminate\Http\Request;

class EquipamentostesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {       //aqui vai o nome tabela
            $equipamentoss = Equipamentoteste::all();
            return view('protocolos.index', compact('equipamentoss') );
     }                                              //aqui vai o nome tabela

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    //
    return view('protocolos.create', ['action'=>route('equipamento.store'), 'method'=>'post']);
}               //pasta.arquivocreate                                //rota

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    //
    $url = $request->get('redirect_to', route('equipamento.index'));
    if (! $request->has('cancel') ){
        $dados = $request->all();
        Equipamentoteste::create($dados);
        $request->session()->flash('message', 'Equipamento cadastrado com sucesso');
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
    public function update(Equipamentoteste $equipamento,Request $request)
    {
        if (! $request->has('cancel') ){
            $equipamento->nome = $request->input('nome');
            $equipamento->campoprotocolo = $request->input('campoprotocolo');
            $equipamento->descricao = $request->input('descricao');
            $equipamento->DataRequisicao = $request->input('DataRequisicao');
            $equipamento->demandante = $request->input('demandante');
            $equipamento->update();
            \Session::flash('message', 'Cadastro Protocoloc atualizado com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->route('equipamento.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Equipamentoteste $equipamento, Request $request)
    {
        
        if (! $request->has('cancel') ){
            $equipamento->delete();
            \Session::flash('message', 'Equipamento excluído com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->route('equipamento.index'); 
    }
}
