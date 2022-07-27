<?php

namespace App\Http\Controllers;
use App\Protos; 
use App\Cadastropessoass; //coloquei para usar Model  Cadastropessoass
use App\Equipamentoteste; //CUIDAR COLOQUEI O MODEL EM CIMA NAMESPACE DEU ERRO!!
use App\Http\Requests\StoreUpdateEquipamentoFormRequest;
use Illuminate\Http\Request;

class EquipamentostesteController extends Controller
{
    
    public function index()

    { //variavel botão  
        $search = request('search');
                                  // variaveis que serão procuradas
        $protos = Protos::where('prazo', 'LIKE', '%' . $search . '%')
            //nome Controller
            ->orWhere('descricao', 'LIKE', '%' . $search . '%')
            ->orWhere('DataRequisicao', 'LIKE', '%' . $search . '%')
            ->orWhere('cadastropessoass_id', 'LIKE', '%' . $search . '%')//arrumar para buscar por pessoa!
            ->paginate(10);
        //paginação
        //$protos = Protos::paginate(10);
        //aqui vai o nome tabela                  //passar função search
        return view('protocolos.index', compact('protos', 'search'));
    }              //nome pasta               //aqui vai o nome tabela

    

    public function cadastro(Request $request)
    {    //variavel passada pro select
        //analisar esta parte depois, pois não está pasando variavel pessoa!!
        $pessoa = Cadastropessoass::all();
        for($i = 0; $i < count($pessoa); $i++)
       // $pessoa = new Cadastropessoass ();
        $pessoa->nome = $request->input('pessoa');
       // $pessoa->save();
        //analisar esta parte depois, pois não está pasando variavel pessoa!!
        return view('protocolos.create', ['action' => route('saveprot'), 'method' => 'post', 'pessoas' => $pessoa]);
    }               //pasta.arquivocreate                  //rota nova


                   //passamos aqui validator para mensagens erros!
    public function store(StoreUpdateEquipamentoFormRequest  $request)
    {
        //dd($request);
        //  if (! $request->has('cancel') ){ caso usuario click em cancel!
        if (! $request->has('cancel') ){
        $cadastropessoass = Cadastropessoass::find($request->input('cadastropessoass_id'));
        $protos = new Protos($request->all());
        $protos->descricao = $request->input('descricao');
        $protos->DataRequisicao = $request->input('DataRequisicao');
        $protos->prazo = $request->input('prazo');
        $protos->cadastropessoass()->associate($cadastropessoass);
        $protos->save();
        \Session::flash('msg_create',"criado");
    
    }else
    { 
        $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
    }


       return redirect('/tabelaprotocolo')->with('success', 'Protocolo cadastrado com sucesso!');
    }
    

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {

        $protocolo = Protos::find($id);

        $pessoa = Cadastropessoass::all();

        return view('protocolos/edit', compact('pessoa', 'protocolo'));
    }


    public function update(  StoreUpdateEquipamentoFormRequest $request, $id)
    {

        $protocolo = Protos::findOrFail($id);
        $pessoa = Cadastropessoass::all();
        $protocolo->update([
            'pessoa_id' => $request->pessoa_id,
            'descricao' => $request->descricao,
            'DataRequisicao' => $request->DataRequisicao,
            'prazo' => $request->prazo,


        ]);


        return redirect('/tabelaprotocolo')->with('success', 'Protocolo editado com sucesso!');
    }

   
    public function delete($id)
    {
        $protocolo = Protos::find($id);
        $protocolo->delete();
        return redirect('/tabelaprotocolo')->with('warning', 'Protocolo excluido com sucesso!');;
    }                    //retorno pra tabela
}