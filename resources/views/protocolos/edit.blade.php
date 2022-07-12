@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo col-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Editar Protocolos</h3>
                <!-- rota-->
                <form action={{ route('equipamento.update', ['equipamento' => $eqp1]) }} method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>
                    <div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Digite numero do Protocolo</label>
                            <div class="col-md-6">
                                <input type="text" name="nome" class="form-control" value="{{ $eqp1->nome }}">
                            </div>
                        </div>
                        <!--  CAMPO  descrição do Protocolo-->
                        <div class="form-group">
                            <label class="col-md-6 control-label">Digite descrição do Protocolo</label>
                            <div class="col-md-6">
                                <input type="text" name="campoprotocolo" class="form-control"
                                    value="{{ $eqp1->campoprotocolo }}">
                            </div>

                            {{-- - Formulario DataRequisição - --}}

                            <div class="form-group col-md-4">
                                <label for="DataRequisicao" class="control-label">Data desta Requisição</label>
                                <div class="input-group">
                                    <input type="date" id="DataRequisicao" class="form-control" name="DataRequisicao"
                                        value="{{ $eqp1->DataRequisicao }}">
                                </div>
                            </div>

                            <!--  CAMPO prazo requisição DEIXAR 500  CARACTERES-->
                            <div class="form-group">
                                <label for="descricao">Digite Prazo do Protocolo</label>
                                <div class="col-md-6">
                                    <input type="text" name="descricao" class="form-control"
                                        value="{{ $eqp1->descricao }}">
                                </div>
                            </div>
                            <!--  CAMPO prazo requisição -->
                            <div class="form-group">
                                <label class="col-md-6 control-label">Digite Nome Demandante!</label>
                                <div class="col-md-6">
                                    <input type="text" name="demandante" class="form-control"
                                        value="{{ $eqp1->demandante }}">
                                </div>

                                <div>

                                    <div class="form-group">
                                        <input type="submit" name="save_eqp" value="Atualizar Cadastro">
                                        <input type="submit" name="cancel" value="Cancelar">
                                    </div>
                                </div>
                            </div>

                </form>
            </div>
        </div>

    @endsection
