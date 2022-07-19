@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h3>Editar Protocolos</h3>
            <form action={{ route('cadastropessoass.update', ['eqp' => $eqp->id]) }} method="post">
                @csrf
                @method('PUT')
                <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>
                     
                      <!--  CAMPO  editado com bootstrap arrumar depois-->
                  
                    <div class="form-group">
                        <label for="id" class="control-label">Id do cadastro</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="id" name="endereco"disabled
                                value="{{ isset($eqp->id) ? $eqp->id : old('endereco') }}">
                        </div>
                                                                <!--  old é para persistir o erro no campo!-->
                        <!--  CAMPO Id-->
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nome" name="nome"
                                    value="{{ isset($eqp->nome) ? $eqp->nome : old('nome') }}">
                            </div>

                            <!--  CAMPO  Nome-->
                            <div class="form-group">
                                <label for="endereco" class="control-label">Endereco</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="endereco" name="endereco"
                                        value="{{ isset($eqp->endereco) ? $eqp->endereco : old('endereco') }}">
                                </div>
                            </div>
                            {{-- - Formulario Endereco - --}}

                            <div class="form-group">
                                <label for="cidade" class="control-label">Cidade</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cidade" name="cidade"
                                        value="{{ isset($eqp->cidade) ? $eqp->cidade : old('cidade') }}">
                                </div>
                            </div>
                            <!--  CAMPO Cidade -->
                            <div class="form-group">
                                <label for="telefone" class="control-label">Telefone</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="telefone" name="telefone"
                                        value="{{ isset($eqp->telefone) ? $eqp->telefone : old('telefone') }}">
                                </div>
                            </div>
                            <!--  CAMPO Telefone-->
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ isset($eqp->email) ? $eqp->email : old('email') }}">
                                </div>
                            </div>
                            <!--  CAMPO E-mail -->
                            <div class="form-group">
                                <label for="cpf" class="control-label">Cpf</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cpf" name="cpf"
                                        value="{{ isset($eqp->cpf) ? $eqp->cpf : old('cpf') }}">
                                </div>
                            </div>
                            <!--  CAMPO Cpf -->
                            <div class="form-group">
                                <label for="bairro" class="control-label">Bairro</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="bairro" name="bairro"
                                        value="{{ isset($eqp->bairro) ? $eqp->bairro : old('bairro') }}">
                                </div>
                            </div>
                            <!--  CAMPO Bairro -->
                            <div class="form-group">
                                <label for="datanascimento" class="control-label">Data Nascimento</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="bairro" name="datanascimento"
                                        value="{{ isset($eqp->datanascimento) ? $eqp->datanascimento : old('datanascimento') }}">
                                </div>
                            </div>
                            <!--  CAMPO sexo -->

            
                            <div class="form-group">
                                <label for="sexo" class="control-label">sexo</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="sexo" name="sexo"
                                        value="{{ isset($eqp->sexo) ? $eqp->sexo : old('sexo') }}">
                                </div>
                            </div>
                     <!--  CAMPO Complemento -->
                            <div class="form-group">
                                <label for="complemento" class="control-label">Complemento</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                        value="{{ isset($eqp->complemento) ? $eqp->complemento : old('complemento') }}">
                                </div>
                            </div>

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
