<?php

namespace App\Http\Controllers;
use App\Protos;
use App\User; 
use App\Departamento; 
use App\Acompanhamentos; 
use App\Arquivos;
use App\Cadastropessoass; //coloquei para usar Model  Cadastropessoass
 //arquivo
use PDF;//usar pdf aqui relatorio

use App\Http\Requests\StoreUpdateEquipamentoFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SeriesFormRequest;

class ProtosController extends Controller
{
    
    public function index(Request $request)

    { //variavel botão  
        $search = request('search');
                                  // variaveis que serão procuradas
        $protos = Protos::with('DataRequisicao', date('2022-01-01'),$search.'%');
        //$user_id = Acompanhamentos::find($id);
       // $protos = Acompanhamentos::whereIn('user_id', $user_id)->get();

       //tentar buscar id acompanhante!!!
        $protos = Acompanhamentos::all()->pluck('user_id');
        //$protos = $user_id->Acompanhamentos()->get();
        //$departamento = Departamento::find($request->input('departamento_id'));
      //analizar amanha!!!!!!!

       //  $protos = Protos::whereIn('DataRequisicao',[01,12], '%2022' . $search . '%');
      // $departamento = Departamento::all();
        //$usuario = User::find(Auth::id());
      // Departamento_user::where('user_id', $departamento->user_id)
       $departamento = User::all()->pluck('departamento_id');
      // $departamento = User::all()->pluck('departamento_id');
       $user = Auth::user();
       $protos = Protos::whereIn('departamento_id', $departamento)->get();

        $protos = Protos::where('prazo', 'LIKE', '%' . $search . '%')
        //modifiquei novamente verficar caso para de funcionar!!!!
            //nome Controller
            ->orWhere('descricao', 'LIKE', "%{$request->search}%")
            ->orWhere('DataRequisicao', 'LIKE', '%' . $search . '%')
            ->orWhere('cadastropessoass_id', 'LIKE', "%{$request->search}%")->get();
          
            
        //paginação
        //$protos = Protos::paginate(10);
        //aqui vai o nome tabela                  //passar função search
        return view('protocolos.index', compact('protos',$protos, 'search',$search));
    }              //nome pasta               //aqui vai o nome tabela

    

    public function registrarcadastro(Request $request)
    {    //variavel passada pro select
        //analisar esta parte depois, pois não está pasando variavel pessoa!!
        $pessoa = Cadastropessoass::all();
        for($i = 0; $i < count($pessoa); $i++)
       // $pessoa = new Cadastropessoass ();
        $pessoa->nome = $request->input('pessoa');
        
       //analizar amanha!!!!!!!
        $protocolo = Protos::all();
       // $pessoa = Pessoa::all();
        $user = Auth::user();
        //$departamento = User::departamento('profiles')->get();
       // $departamento = User::departamento('departamento_id')->get();
        $departamento = $user->departamento()->get();
        return view('protocolos.create', compact('pessoa', $pessoa, 'protocolo', $protocolo,'departamento', $departamento));
       // $pessoa->save();
        //analisar esta parte depois, pois não está pasando variavel pessoa!!
       // return view('protocolos.create', ['action' => route('saveprot'), 'method' => 'post', 'pessoas' => $pessoa]);
    }               //pasta.arquivocreate                  //rota nova


                   //passamos aqui validator para mensagens erros!
    public function cadastroprotocolo(StoreUpdateEquipamentoFormRequest  $request )
    {
        //dd($request);
        //  if (! $request->has('cancel') ){ caso usuario click em cancel!
         //  if (! $request->has('cancel') )
         $departamento = Departamento::find($request->input('departamento_id'));
        // $protos->departamento = $request->input('departamento');
         $cadastropessoass = Cadastropessoass::find($request->input('cadastropessoass_id'));
        $protos = new Protos($request->all());
        $protos->descricao = $request->input('descricao');
        $protos->DataRequisicao = $request->input('DataRequisicao');
        $protos->prazo = $request->input('prazo');
        $protos->cadastropessoass()->associate($cadastropessoass);
        $protos->departamento()->associate($departamento);

        
      
        $validator = Validator::make($request->all(), [
            'descricao' => 'required',
            'DataRequisicao' => 'required',
            'prazo' => 'required',

        ], [
            'descricao.required' => 'O campo descrição é obrigatório',
            'DataRequisicao.unique' => 'O campo data é obrigatório',
            'prazo.required' => 'O campo prazo é obrigatório',

        ]);
        if ($validator->fails()) {
            return redirect('tabelaprotocolo')
                ->withErrors($validator)
                ->withInput();
        }
        $protos->save();
    
      if (!empty($request->allFiles()['arquivo'])) {
      for ($i = 0; $i < count($request->allFiles()['arquivo']); $i++){
        $arquivo = $request->allFiles()['arquivo'][$i];
            // usando model arquivos
        $anexos = new Arquivos();
        $anexos->tipo = 'arquivo';
  //  relacionamento tabela    variavel ->id
        $anexos->protoss_id = $protos->id;            // variavel
        $anexos->arquivo = $arquivo->store('arquivo/' . $protos->id);
        $anexos->save();                     //pasta criada laravel
        //dd($request->file('arquivos'));
      }

      \Session::flash('message',"Cadastrado com Sucesso!");
      if (! $request->has('cancel') )
    
       $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
  

      }
       return redirect('/tabelaprotocolo')->with('message', 'Protocolo cadastrado com sucesso!');
    }

    public function upload(Request $request)
    {

        $request->file('arquivo')->store('protosss');
        var_dump($request->file('arquivo'), $request->all);
    }
    
    public function editarprotocolos($id)
    {

        $protocolo = Protos::find($id);

        $pessoa = Cadastropessoass::all();

        return view('protocolos/edit', compact('pessoa', 'protocolo'));
    }


    public function atualizandoprotocolo(  StoreUpdateEquipamentoFormRequest $request, $id)
    {

        $protocolo = Protos::findOrFail($id);
        $pessoa = Cadastropessoass::all();
        $protocolo->update([
            'pessoa_id' => $request->pessoa_id,
            'descricao' => $request->descricao,
            'DataRequisicao' => $request->DataRequisicao,
            'prazo' => $request->prazo,


        ]);


        return redirect('/tabelaprotocolo')->with('message', 'Protocolo editado com sucesso!');
    }

   
    public function deletandoprotocolo($id)
    {
        $protocolo = Protos::find($id);
        $protocolo->delete();
        return redirect('/tabelaprotocolo')->with('message', 'Protocolo excluido com sucesso!');
    }                    //retorno pra tabela

//coloquei porque estava dando erro time 60 no pdf
    public function __construct()
{
    ini_set('max_execution_time', 300);
}

    public function pdf()
    {      
        $protos = Protos::all();

        $pdf = PDF::loadView('pdf.index', compact('protos'));

        return $pdf->setPaper('a4')->download('relatorio-geral.pdf');
    }

    public function pdfunico($id)
    {
        $protocolo = Protos::find($id);
        $pessoa = Cadastropessoass::all();
      //  $DataRequisicao = Cadastropessoass::all();
       // $descricao = Cadastropessoass::all();
       // ['pessoa'=>$pessoa,'DataRequisicao'=>$DataRequisicao,'descricao'=>$descricao]);
       
        $pdf = PDF::loadView('pdf.pdfunico', compact('protocolo','pessoa'));

        return $pdf->setPaper('a4')->download('relatorio-pdf-unico.pdf');
    }



    public function acompanhamentoprotocolo(Request $request, $id)
    {

        $id = request()->route()->parameter('id');
        
        $acompanhamento = Acompanhamentos::all();
        $user = User::all();
        $protocolo = Protos::find($id);
        return view('protocolos/acompanhamento', compact('acompanhamento', $acompanhamento, 'user', $user, 'protocolo', $protocolo));
    }

    public function saveacompanhamento(Request $request, $id)
    {


        $protos = Protos::find($id);
        $acompanhamento = new Acompanhamentos($request->all());
        $acompanhamento->descricao = $request->input('descricao');
        $acompanhamento->data = $request->input('data');
        $acompanhamento->protocolo()->associate($protos);
        $acompanhamento->save();
        return redirect('/tabelaprotocolo')->with('message', 'acompanhamento criado com sucesso!');
       
        
    }

}

