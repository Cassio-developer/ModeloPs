@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="card">
        <div class="card-header">

            <h3>Editar Cadastro Pessoas</h3>
            <form action={{ route('cadastropessoass.update', ['eqp' => $eqp->id]) }} method="post">
                @csrf
                @method('PUT')
                <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>

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
                            <input type="text" id="nome" name="nome" value="{{ $eqp->nome }}">
                        </div>

                        {{-- - Formulario Endereco - --}}

                        <div class="form-group col-md-3">
                            <label for="descricao" class="control-label">Endereco</label>
                            <div class="input-group">
                                <input type="text" id="endereco" name="endereco" value="{{ $eqp->endereco }}">
                            </div>
                        </div>

                        <!--  CAMPO Datanascimento -->
                        <div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Datanascimento</label>
                                <div class="col-md-8">
                                    <input type="date" id="datanascimento" name="datanascimento"
                                        value="{{ $eqp->cpf }}">
                                </div>
                            </div>
                            <!--  CAMPO Cidade -->
                            <div class="form-group">
                                <label class="col-md-6 control-label">Cidade</label>
                                <div class="col-md-6">
                                    <input type="cidade" id="cidade" name="cidade" value="{{ $eqp->cidade }}">
                                </div>
                            </div>
                            <!--  CAMPO Telefone-->
                            <div class="form-group">
                                <label class="col-md-6 control-label">Telefone</label>
                                <div class="col-md-8">
                                    <input type="text" id="telefone" name="telefone" value="{{ $eqp->telefone }}">
                                </div>
                                <!--  CAMPO E-mail -->
                                <div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">E-mail</label>
                                        <div class="col-md-8">
                                            <input type="text" id="email" name="email" value="{{ $eqp->email }}">
                                        </div>
                                        <!--  CAMPO Cpf -->
                                        <div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Cpf</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="cpf" name="cpf"
                                                        value="{{ $eqp->cpf }}">
                                                </div>
                                                <div>
                                                    <!--  CAMPO Bairro -->
                                                    <div>
                                                        <div class="form-group">
                                                            <label class="col-md-6 control-label">Bairro</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="bairro" name="bairro"
                                                                    value="{{ $eqp->bairro }}">
                                                            </div>
                                                            <div>

                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="edit_eqp">Editar Cadastro</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="cancel">Cancelar</button>
                                                                </div>
                                                            </div>
            </form>
        </div>
    </div>

@endsection
