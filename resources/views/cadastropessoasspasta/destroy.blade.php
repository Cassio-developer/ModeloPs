@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!--aqui vai variavel route metodo delete -->
                    <form action={{ route('cadastropessoass.destroy', ['cadastropessoass' => $eqp->id]) }} method="post">
                        @csrf
                        <!--aqui eqp vai ser acionado pelo botaão -->
                        @method('DELETE')

                        <div class="form-group">
                            <label for="id" class="control-label">Id do cadastro</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="id" name="endereco"
                                    value="{{ isset($eqp->id) ? $eqp->id : old('id') }}"disabled>
                            </div>

                            <!--  CAMPO Id-->
                            <div class="form-group">
                                <label for="nome" class="control-label">Nome</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nome" name="nome"
                                        value="{{ isset($eqp->nome) ? $eqp->nome : old('nome') }}"disabled>
                                </div>

                                <!--  CAMPO  Nome-->
                                <div class="form-group">
                                    <label for="endereco" class="control-label">Endereco</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="endereco" name="endereco"
                                            value="{{ isset($eqp->endereco) ? $eqp->endereco : old('endereco') }}"disabled>
                                    </div>
                                </div>
                                {{-- - Formulario Endereco - --}}

                                <div class="form-group">
                                    <label for="cidade" class="control-label">Cidade</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                            value="{{ isset($eqp->cidade) ? $eqp->cidade : old('cidade') }}"disabled>
                                    </div>
                                </div>
                                <!--  CAMPO Cidade -->
                                <div class="form-group">
                                    <label for="telefone" class="control-label">Telefone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                            value="{{ isset($eqp->telefone) ? $eqp->telefone : old('telefone') }}"disabled>
                                    </div>
                                </div>
                                <!--  CAMPO Telefone-->
                                <div class="form-group">
                                    <label for="email" class="control-label">E-mail</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ isset($eqp->email) ? $eqp->email : old('email') }}"disabled>
                                    </div>
                                </div>
                                <!--  CAMPO E-mail -->
                                <div class="form-group">
                                    <label for="cpf" class="control-label">Cpf</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            value="{{ isset($eqp->cpf) ? $eqp->cpf : old('cpf') }}"disabled>
                                    </div>
                                </div>
                                <!--  CAMPO Cpf -->
                                <div class="form-group">
                                    <label for="bairro" class="control-label">Bairro</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                            value="{{ isset($eqp->bairro) ? $eqp->bairro : old('bairro') }}"disabled>
                                    </div>
                                </div>
                                <!--  CAMPO Bairro -->
                                <div class="form-group">
                                    <label for="datanascimento" class="control-label">Data Nascimento</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="bairro" name="datanascimento"
                                            value="{{ isset($eqp->datanascimento) ? $eqp->datanascimento : old('datanascimento') }}"disabled>
                                    </div>
                                </div>
                                <!--  CAMPO Datanascimento -->

                                <div class="row justify-content-center-alert alert" role="alert">
                                    <h4 class="alert-heading">Exclusão!!</h4>
                                    <p>Esta operação não poderá ser desfeita! Confirma a
                                        exclusão do Cadastro?</p>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="delete_eqp">Deletar
                                        Cadastro</button>
                                    <button type="submit" class="btn btn-primary" name="cancel">Cancelar</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection
