@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo">
        <form action="#" method="post" class="form-horizontal" id="formProduto">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h1 class="col-12 modal-title text-center">Cadastro de Pessoa</h1>
                </div>
                <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
                <div class="container col-11">
                    <input type="hidden" id="id" class="form-control">

                    {{-- - Formulario Nome - --}}

                    <div class="form-group">
                        <label for="nome" class="control-label">Nome: *</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Nome completo"required
                                value="{{ isset($cras->nome) ? $cras->nome : old('nome') }}">
                        </div>
                    </div>

                    {{-- - Formulario Endereco Cras - --}}

                    <div class="form-group">
                        <label for="endereco" class="control-label">Endereço: *</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="endereco" name="endereco"required
                                placeholder="Ex: Av. Dom João Becker, Centro"
                                value="{{ isset($cras->endereco) ? $cras->endereco : old('endereco') }}">
                        </div>

                        {{-- - Formulario Endereco Cras - --}}

                        <div class="form-group">
                            <label for="cidade" class="control-label">Cidade: *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cidade" name="cidade"required
                                    placeholder="Ex: Porto alegre" value="">
                            </div>

                        </div>

                        {{-- - Formulario Telefone Cras - --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tel" class="control-label">Telefone: *</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control phone_with_ddd" name="tel" id="tel"
                                        value="{{ isset($cras->telefone) ? $cras->telefone : old('tel') }}"
                                        placeholder="(00)0000-0000" />
                                </div>
                            </div>

                            {{-- - Formulario nascimento Cras - --}}

                            <div class="form-group col-md-3">
                                <label for="datanascimento" class="control-label">Data de Nascimento:</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="date" id="date" value="}}"
                                        placeholder="ex: 02/05/1988" />
                                </div>



                            </div>
                        </div>




                        {{-- - Formulario E-mail Cras - --}}

                        <div class="form-group">
                            <label for="email" class="control-label">E-mail:</label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" id="email "
                                    value="{{ isset($cras->email) ? $cras->email : old('email') }}"
                                    placeholder="exemplo@exemplo.com" />




                            </div>
                            <!--  CAMPO CPF -->
                            <div class="form-group">
                                <label class="col-md-6 control-label">CPF</label>
                                <div class="col-md-6">
                                    <input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}"
                                        required placeholder="ex:000000000000">
                                </div>
                            </div>
                            {{-- - Formulario bairro - --}}

                            <div class="form-row">
                                <label for="cidade" class="control-label">Bairro: *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="bairro" name="bairro"required
                                        placeholder="Ex: Porto alegre" value="">
                                </div>


                                <!--  CAMPO complemento -->
                                <div class="col-md-3 form-group">
                                    <label for="complemento" class="control-label">Complemento</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Ex: Casa,Apt" value="">
                                    </div>
                                </div>

                                <!--  CAMPO complemento -->
                                <div class="form-group col-lg-3">
                                    <label for="exampleInputEmail1">Selecione Sexo</label required>
                                    <select class="form-control">
                                        <option value="">Selecione Aqui</option>
                                        <option value="">Masculino</option>
                                        <option value="">Femenino</option>
                                    </select>
                                    <!--  CAMPO Numero -->
                                    <div class="form-group col-md-3">
                                        <label for="numero" class="control-label">Digite aqui Numero:</label>
                                        <div class="input-group">
                                            <input type="number" class=" numero" name="numero" id="numero"
                                                value="}}" placeholder="ex: 90" />
                                        </div>
                                        <!--  CAMPO Salvar -->
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a class="btn btn-secondary" href="#">Cancelar</a>
                                    <br>


                                </div>
                            </div>
        </form>
    </div>

@endsection
