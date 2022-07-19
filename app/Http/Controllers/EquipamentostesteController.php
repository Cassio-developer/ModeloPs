<?php

namespace App\Http\Controllers;

use App\Cadastropessoass; //coloquei para usar Model  Cadastropessoass
use App\Equipamentoteste; //CUIDAR COLOQUEI O MODEL EM CIMA NAMESPACE DEU ERRO!!
use App\Http\Requests\StoreUpdateEquipamentoFormRequest;
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
        $equipamentoss = Equipamentoteste::where('numero', 'LIKE', '%' . $search . '%')
                          //nome Controller
            ->orWhere('campoprotocolo', 'LIKE', '%' . $search . '%')
            ->orWhere('descricao', 'LIKE', '%' . $search . '%')
            ->orWhere('DataRequisicao', 'LIKE', '%' . $search . '%')
            ->orWhere('pessoa', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        //paginação
        $equipamentoss = Equipamentoteste::paginate(10);
        //aqui vai o nome tabela                                 //passar função search
        return view('protocolos.index', compact('equipamentoss', 'search'));
    }                 //nome pasta               //aqui vai o nome tabela

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {    //variavel passada pro select
        //analisar esta parte depois, pois não está pasando variavel pessoa!!
        $pessoa = Cadastropessoass::all();
        for($i = 0; $i < count($pessoa); $i++)
       // $pessoa = new Cadastropessoass ();
        $pessoa->nome = $request->input('pessoa');
       // $pessoa->save();
        //analisar esta parte depois, pois não está pasando variavel pessoa!!
        return view('protocolos.create', ['action' => route('equipamento.store'), 'method' => 'post', 'pessoas' => $pessoa]);
    }               //pasta.arquivocreate                                //rota

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEquipamentoFormRequest  $request)
    {
        
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
         
            $equipamentoss->numero = $request->input('numero')->default('');
            $equipamentoss->campoprotocolo = $request->input('campoprotocolo');
            $equipamentoss->descricao = $request->input('descricao');
            $equipamentoss->DataRequisicao = $request->input('DataRequisicao');
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
