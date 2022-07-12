@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')
<div class="conteudo">
 <div class="row justify-content-center">
        <div class="col-md-4">
 
        <h3>Editar Equipamento</h3>
    <form action={{route('CadastroPESSOAS.update', ['variavel'=> $variavel=>id])}} method="post">
        @csrf
        @method('PUT')
        <input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
        
        <div>
    <label for="tipo">Id</label>
    <input type="text" id="id" name="tipo" value="{{$variavel->id}}" disabled>
    </div>
    <div>
    <label for="tipo">Nome</label>
    <input type="text" id="nome" name="nome" value="{{$variavel->nome}}" disabled>
    </div>
    <div>
    <label for="tipo">Endereco</label>
    <input type="text" id="endereco" name="endereco" value="{{$variavel->endereco}}" disabled>
    </div>
    <div>
    <label for="modelo">Cidade</label>
    <input type="text" id="cidade" name="cidade" value="{{$variavel->cidade}}" disabled>
    </div>
    <div>
    <label for="fabricante">Telefone</label>
    <input type="text" id="telefone" name="telefone" value="{{$variavel->telefone}}" disabled>
    </div>
    <div>
    <div>
    <label for="fabricante">E-mail</label>
    <input type="text" id="email" name="email" value="{{$variavel->email}}" disabled>
    </div>
    <div>
    <label for="fabricante">Cpf</label>
    <input type="text" id="cpf" name="cpf" value="{{$variavel->cpf}}" disabled>
    </div>
    
    <div>
    <label for="fabricante">Bairro</label>
    <input type="text" id="bairro" name="bairro" value="{{$variavel->bairro}}" disabled>
    </div>
    <label for="fabricante">Datanascimento</label>
    <input type="text" id="datanascimento" name="datanascimento" value="{{$variavel->datanascimento}}" disabled>
    </div>
     <div class="form-group">
                <input type="submit" name="save_eqp" value="Atualizar equipamento">
                <input type="submit" name="cancel" value="Cancelar">
            </div>
        </div>
    </form>
</div>
</div>

@endsection