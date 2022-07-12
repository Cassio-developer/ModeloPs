@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')
<div class="conteudo">
 <div class="row justify-content-center">
        <div class="col-md-4">
        
    <h1>Deletar Cadastro</h1>       <!--aqui vai variavel route metodo delete -->
    <form action={{route('cadastropessoass.destroy', ['cadastropessoass' => $eqp->id])}} method="post">
    @csrf                                                    <!--aqui eqp vai ser acionado pelo botaão -->
    @method('DELETE')
    
    <input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
    <div>
    <label for="tipo">Id</label>
    <input type="text" id="id" name="tipo" value="{{$eqp->id}}" disabled>
    </div>
    <div>
    <label for="tipo">Nome</label>
    <input type="text" id="nome" name="nome" value="{{$eqp->nome}}" disabled>
    </div>
    <div>
    <label for="tipo">Endereco</label>
    <input type="text" id="endereco" name="endereco" value="{{$eqp->endereco}}" disabled>
    </div>
    <div>
    <label for="modelo">Cidade</label>
    <input type="text" id="cidade" name="cidade" value="{{$eqp->cidade}}" disabled>
    </div>
    <div>
    <label for="fabricante">Telefone</label>
    <input type="text" id="telefone" name="telefone" value="{{$eqp->telefone}}" disabled>
    </div>
    <div>
    <div>
    <label for="fabricante">E-mail</label>
    <input type="text" id="email" name="email" value="{{$eqp->email}}" disabled>
    </div>
    <div>
    <label for="fabricante">Cpf</label>
    <input type="text" id="cpf" name="cpf" value="{{$eqp->cpf}}" disabled>
    </div>
    
    <div>
    <label for="fabricante">Bairro</label>
    <input type="text" id="bairro" name="bairro" value="{{$eqp->bairro}}" disabled>
    </div>
    <label for="fabricante">Datanascimento</label>
    <input type="text" id="datanascimento" name="datanascimento" value="{{$eqp->datanascimento}}" disabled>
    </div>
    
    
    
    <div class="alert alert-danger" role="alert"><h1>Esta operação não poderá ser desfeita! Confirma a exclusão do Cadastro??</h1></div>
    <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="delete_eqp">Deletar Protocolo</button>
             <button type="submit" class="btn btn-primary" name="cancel">Cancelar</button>
        </div>
  </div>
  </form>
</div>
</div>

@endsection