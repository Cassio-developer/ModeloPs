@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')
<div class="conteudo">
 <div class="row justify-content-center">
        <div class="col-md-4">
 
        <h3>Editar Protocolos</h3>
                           <!-- rota-->
    <form action={{route('Protocolos.update', ['proto'=> $proto=>id])}} method="post">
        @csrf
        @method('PUT')
        <input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
        <div>
    <label for="tipo">Id</label>
    <input type="text" id="id" name="id" value="{{$proto->id}}" disabled>
    </div>
     <div>
    <label for="tipo">Nome</label>
    <input type="text" id="nome" name="nome" value="{{$proto->nome}}" disabled>
    </div>
    <div>
    <label for="tipo">Campo Protocolo</label>
    <input type="text" id="campoprotocolo" name="campoprotocolo" value="{{$proto->campoprotocolo}}" disabled>
    </div>
    <div>
    <label for="tipo">Demandante</label>
    <input type="text" id="descrição" name="demandante" value="{{$proto->demandante}}" disabled>
    </div>
    <div>
    <label for="modelo">Data Requisição</label>
    <input type="text" id="DataRequisição" name="DataRequisição" value="{{$proto->DataRequisição}}" disabled>
    </div>
    <div>
    <label for="fabricante">Demandante</label>
    <input type="text" id="demandante" name="demandante" value="{{$proto->demandante}}" disabled>
    </div>
    <div>
    
     <div class="form-group">
                <input type="submit" name="save_eqp" value="Atualizar Cadastro">
                <input type="submit" name="cancel" value="Cancelar">
            </div>
        </div>
    </form>
</div>
</div>

@endsection