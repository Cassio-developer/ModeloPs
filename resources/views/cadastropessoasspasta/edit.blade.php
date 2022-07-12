@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')
<div class="conteudo">
 <div class="row justify-content-center">
        <div class="col-md-4">
 
        <h3>Editar Equipamento</h3>
    <form action={{route('cadastropessoass.update', ['eqp'=> $eqp->id])}} method="post">
        @csrf
        @method('PUT')
        <input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
        
        <div>
    <label for="tipo">Id</label>
    <input type="text" id="id" name="tipo" value="{{$eqp->id}}" disabled>
    </div>
    <div>
    <label for="tipo">Nome</label>
    <input type="text" id="nome" name="nome" value="{{$eqp->nome}}">
    </div>
    <div>
    <label for="tipo">Endereco</label>
    <input type="text" id="endereco" name="endereco" value="{{$eqp->endereco}}">
    </div>
    <div>
    <label for="modelo">Cidade</label>
    <input type="text" id="cidade" name="cidade" value="{{$eqp->cidade}}">
    </div>
    <div>
    <label for="fabricante">Telefone</label>
    <input type="text" id="telefone" name="telefone" value="{{$eqp->telefone}}">
    </div>
    <div>
    <div>
    <label for="fabricante">E-mail</label>
    <input type="text" id="email" name="email" value="{{$eqp->email}}">
    </div>
    <div>
    <label for="fabricante">Cpf</label>
    <input type="text" id="cpf" name="cpf" value="{{$eqp->cpf}}">
    </div>
    
    <div>
    <label for="fabricante">Bairro</label>
    <input type="text" id="bairro" name="bairro" value="{{$eqp->bairro}}">
    </div>
    <label for="fabricante">Datanascimento</label>
    <input type="text" id="datanascimento" name="datanascimento" value="{{$eqp->datanascimento}}">
    </div>
      <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="save_eqp">Cadastrar</button>
             <button type="submit" class="btn btn-primary" name="cancel">Cancelar</button>
        </div>
        </div>
    </form>
</div>
</div>

@endsection