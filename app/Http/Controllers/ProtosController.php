<?php

namespace App\Http\Controllers;
use App\Protos;
use Illuminate\Http\Request;

class ProtosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $protosss = Protos::all();
        return view('cadastroprotocolo.index', compact('protosss') );
                   //aqui colocar pasta.index
                   //cuidar pois quebrei a cabeça!!!
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cadastroprotocolo.create', ['action'=>route('Protocolos.store'), 'method'=>'post']);
                    //aqui colocar pasta.index            //aqui colocar nome rota.store
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
        $url = $request->get('redirect_to', route('Protocolos.index'));
        if (! $request->has('cancel') ){
            $dados = $request->all();
            Protos::create($dados);
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
    public function update(Protos $proto, Request $request)
    {
        if (! $request->has('cancel') ){
            $proto->nome = $request->input('nome');
            $proto->campoprotocolo = $request->input('campoprotocolo');
            $proto->descricao = $request->input('descrição');
            $proto->DataRequisicao = $request->input('DataRequisição');
            $proto->demandante = $request->input('demandante');
            $proto->update();
            \Session::flash('message', 'Cadastro Protocoloc atualizado com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->route('Protocolo.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protos $protos, Request $request)
    {
        //
        if (! $request->has('cancel') ){
            $protos->delete();
            \Session::flash('message', 'Cadastro Protocolo excluído com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->route('Protocolos.index'); 
    }                   //aqui colocar ROTA.index

}
