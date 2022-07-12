@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <h1>Deletar Cadastro protocolo</h1>
                <form action={{ route('Protocolos.destroy', ['proto' => $eqp1->id]) }} method="post">
                    @csrf
                    <!--declarar igual no delete eqp1 -->
                    @method('DELETE')
                    <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>
                    <div>
                        <label for="tipo">Id</label>
                        <input type="text" id="id" name="id" value="{{ $eqp1->id }}" disabled>
                    </div>

                    <div>
                        <label for="tipo">Nome</label>
                        <input type="text" id="nome" name="nome" value="{{ $eqp1->nome }}" disabled>
                    </div>
                    <div>
                        <label for="tipo">Campo Protocolo</label>
                        <input type="text" id="campoprotocolo" name="campoprotocolo" value="{{ $eqp1->campoprotocolo }}"
                            disabled>
                    </div>
                    <div>
                        <label for="tipo">Demandante</label>
                        <input type="text" id="descricao" name="descricao" value="{{ $eqp1->descricao }}" disabled>
                    </div>
                    <div>
                        <label for="modelo">Data Requisição</label>
                        <input type="text" id="DataRequisicao" name="DataRequisicao" value="{{ $eqp1->DataRequisicao }}"
                            disabled>
                    </div>
                    <div>
                        <label for="fabricante">Demandante</label>
                        <input type="text" id="demandante" name="demandante" value="{{ $eqp1->demandante }}" disabled>
                    </div>


                    <div class="alert alert-danger" role="alert">
                        <h1>Esta operação não poderá ser desfeita! Confirma a exclusão do Cadastro??</h1>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="delete_eqp" value="Deletar Protocolo">
                        <input type="submit" name="cancel" value="Cancelar">
                    </div>
            </div>
            </form>
        </div>
    </div>

@endsection
