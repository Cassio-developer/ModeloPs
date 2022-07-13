<?php

namespace App\Http\Controllers;

use App\Cadastropessoass; //coloquei para usar Model  Cadastropessoass
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

    { //variavel botão  
        $search = request('search');
        // variaveis que serão procuradas
        $equipamentoss = Equipamentoteste::where('nome', 'LIKE', '%' . $search . '%')
            ->orWhere('campoprotocolo', 'LIKE', '%' . $search . '%')
            ->orWhere('descricao', 'LIKE', '%' . $search . '%')
            ->orWhere('DataRequisicao', 'LIKE', '%' . $search . '%')
            ->orWhere('demandante', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        //paginação

        //aqui vai o nome tabela                                 //passar função search
        return view('protocolos.index', compact('equipamentoss', 'search'));
    }                 //nome pasta               //aqui vai o nome tabela

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    //variavel passada pro select
        $pessoa = Cadastropessoass::all();
        return view('protocolos.create', ['action' => route('equipamento.store'), 'method' => 'post', 'pessoas' => $pessoa]);
    }               //pasta.arquivocreate                                //rota

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipamentoss =
            //
            $url = $request->get('redirect_to', route('equipamento.index'));
        if (!$request->has('cancel')) {
            $dados = $request->all();
            Equipamentoteste::create($dados);
            $request->session()->flash('message', 'Equipamento cadastrado com sucesso');
        } else {
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
    public function update(Equipamentoteste $equipamento, Request $request)
    {
        if (!$request->has('cancel')) {
            $equipamentoss->nome = $request->input('nome');
            $equipamentoss->campoprotocolo = $request->input('campoprotocolo');
            $equipamentoss->descricao = $request->input('descricao');
            $equipamentoss->DataRequisicao = $request->input('DataRequisicao');
            $equipamentoss->demandante = $request->input('demandante');
            $equipamentoss->update();
            \Session::flash('message', 'Cadastro Protocoloc atualizado com sucesso !');
        } else {
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

        if (!$request->has('cancel')) {
            $equipamento->delete();
            \Session::flash('message', 'Equipamento excluído com sucesso !');
        } else {
            $request->session()->flash('message', 'Operação cancelada pelo usuário');
        }
        return redirect()->route('equipamento.index');
    }
}
