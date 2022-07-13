@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="card">
        <div class="card-header">

            <h1>Deletar Cadastro</h1>
            <!--aqui vai variavel route metodo delete -->
            <form action={{ route('cadastropessoass.destroy', ['cadastropessoass' => $eqp->id]) }} method="post">
                @csrf
                <!--aqui eqp vai ser acionado pelo botaão -->
                @method('DELETE')

                <div class="container col-11">
                    <input type="hidden" id="id" class="form-control">

                    <!--  CAMPO Id-->
                    <div class="form-group">
                        <label class="col-md-6 control-label">Id do cadastro</label>
                        <div class="col-md-6">
                            <input type="text" id="id" name="id" value="{{ $eqp->id }}" disabled>

                        </div>
                        <!--  CAMPO  Nome-->
                        <div class="form-group">
                            <label class="col-md-6 control-label">Nome</label>
                            <div class="col-md-6">
                                <input type="text" id="nome" name="nome" value="{{ $eqp->nome }}" disabled>
                            </div>

                            {{-- - Formulario Endereco - --}}

                            <div class="form-group col-md-3">
                                <label for="descricao" class="control-label">Endereco</label>
                                <div class="input-group">
                                    <input type="text" id="endereco" name="endereco" value="{{ $eqp->endereco }}"
                                        disabled>
                                </div>
                            </div>

                            <!--  CAMPO Cidade -->
                            <div class="form-group">
                                <label class="col-md-6 control-label">Cidade</label>
                                <div class="col-md-6">
                                    <input type="date" id="cidade" name="cidade" value="{{ $eqp->cidade }}"
                                        disabled>
                                </div>
                            </div>
                            <!--  CAMPO Telefone-->
                            <div class="form-group">
                                <label class="col-md-6 control-label">Telefone</label>
                                <div class="col-md-8">
                                    <input type="text" id="telefone" name="telefone" value="{{ $eqp->telefone }}"
                                        disabled>
                                </div>
                                <!--  CAMPO E-mail -->
                                <div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">E-mail</label>
                                        <div class="col-md-8">
                                            <input type="text" id="email" name="email" value="{{ $eqp->email }}"
                                                disabled>
                                        </div>
                                        <!--  CAMPO Cpf -->
                                        <div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Cpf</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="cpf" name="cpf"
                                                        value="{{ $eqp->cpf }}" disabled>
                                                </div>
                                                <div>
                                                    <!--  CAMPO Bairro -->
                                                    <div>
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Bairro</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="bairro" name="bairro"
                                                                    value="{{ $eqp->bairro }}" disabled>
                                                            </div>
                                                            <div>
                                                                <!--  CAMPO Datanascimento -->
                                                                <div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-md-6 control-label">Datanascimento</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" id="datanascimento"
                                                                                name="datanascimento"
                                                                                value="{{ $eqp->cpf }}" disabled>
                                                                        </div>
                                                                    </div>




                                                                    <div class="row justify-content-center-alert alert-success"
                                                                        role="alert">
                                                                        <h4 class="alert-heading">Exclusão!!</h4>
                                                                        <p>Esta operação não poderá ser desfeita! Confirma a
                                                                            exclusão do Cadastro?</p>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <button type="submit" class="btn btn-primary"
                                                                            name="delete_eqp">Deletar Cadastro</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            name="cancel">Cancelar</button>
                                                                    </div>



                                                                </div>
                                                            </div>
            </form>
        </div>


    @endsection
