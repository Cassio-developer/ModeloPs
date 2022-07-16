@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
   
        <!--nome rota -->
        <form action={{ route('equipamento.store') }} method="post">
            <!--a rota antes era Protocolos -->
            @csrf
            <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>
            <div class="card">
                <div class="card-header">
                    <h4 class="col-12 modal-title text-center"> Cadastro De Protocolo</h5>
                </div>
                <h2 class="col-12 modal-title text-center">Todos Campos com * são obrigatorios</h2>
                <h3 class="col-12 modal-title text-center"> Para que seja registrado o protocolo, portanto, primeiro a pessoa
                    demandante
                    terá de ser cadastrada no cadastro de pessoas!.</h3>
                <div class="container col-11">
                    <input type="hidden" id="id" class="form-control">

                    <!-- analisar -->

                    <!--  CAMPO numero de ptotocolo -->
                    <div class="form-group">
                        <label class="col-md-6 control-label">Escolha Nome Demandante</label>
                        <div class="col-md-6">
                            <!--  name="pessoa" colocar depois, coloquei par fazer teste pois deu erro sql -->
                            
                            <!--  aqui vai o select -->
                            </select>
                            <div class="form-group col-md-3">
                                <label for="pessoa" class="control-label">pessoa</label>
                                <select name="pessoa" class="form-control" style="width:250px" required
                                    id="pessoa">
                                    <option value="1"
                                        @foreach ($pessoas as $pessoa) <option value="{{ $pessoa->nome }}" 
                                                @if (old('nome_id') == $pessoa->nome) {{ 'selected' }} @endif>
                                        {{ $pessoa->nome }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <!--  CAMPO  descrição do Protocolo-->
                    <div class="form-group">
                        <label for="numero" class="col-sm-50 control-label">Numero Protocolo:</label>
                        <div class="col-md-6">
                            <input type="number" name="numero" value="<?php
                        
                            echo (isset($nome) && ($nome != null || $nome != "")) ? $nome : '';

                            ?>" class="form-control" />

                    <!--  CAMPO  descrição do Protocolo-->
                    <div class="form-group">
                        <label class="col-md-6 control-label">Digite descrição do Protocolo</label>
                        <div class="col-md-12">
                            <input type="text" name="campoprotocolo" class="form-control" required
                                placeholder="Ex: Protocolo será sobre, demanda das obras Seman.">
                        </div>

                        {{-- - Formulario DataRequisição - --}}

                        <div class="form-group col-md-3">
                            <label for="DataRequisicao" class="control-label">Data desta Requisição</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="DataRequisicao" id="DataRequisicao"required
                                    placeholder="ex: 02/05/1989" />
                            </div>
                        </div>

                        <!--  CAMPO prazo requisição DEIXAR 500  CARACTERES-->
                        <div class="form-group">
                            <label for="descricao">Digite Prazo do Protocolo</label>
                            <div class="col-md-6">
                                <input type="text" name="descricao" class="form-control" required
                                    placeholder="Ex: 20/01/2022">
                            </div>
                        </div>
                        <!--  CAMPO prazo requisição -->
                        
                                <!--<label class="col-md-3 control-label">
                                      
                                     <div class="col-md-6-d3">
                                    <strong>Selecione o Demandante</strong>
                                    <select name="demandante" class="form-control" >
                                    <option value="">Clique aqui</option>
                                                
                                    </select>
                                </div>-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a class="btn btn-secondary" href="#">Cancelar</a>
                                </div>
                            </div>

        </form>
    </div>
    </div>
    </div>
    </div>

@endsection
