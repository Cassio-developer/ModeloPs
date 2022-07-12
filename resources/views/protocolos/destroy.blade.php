@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <div class="container col-11">
        <input type="hidden" id="id" class="form-control">


        <h1>Deletar Cadastro protocolo</h1>
        <form action={{ route('equipamento.destroy', ['equipamento1' => $eqp1->id]) }} method="post">
            @csrf
            <!--declarar igual no delete eqp1 -->
            @method('DELETE')
            <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>

            <!--  CAMPO numero de ptotocolo -->
            <div class="form-group">
                <label class="col-md-6 control-label">Numero do Protocolo</label>
                <div class="col-md-6">
                    <input type="text" id="nome" name="nome" value="{{ $eqp1->nome }}" disabled>
                </div>
            </div>
            <!--  CAMPO  descrição do Protocolo-->
            <div class="form-group">
                <label class="col-md-6 control-label">Descrição do Protocolo</label>
                <div class="col-md-6">
                    <input type="text" id="campoprotocolo" name="campoprotocolo" value="{{ $eqp1->campoprotocolo }}"
                        disabled>
                </div>

                {{-- - Formulario DataRequisição - --}}

                <div class="form-group col-md-3">
                    <label for="descricao" class="control-label">Demandante</label>
                    <div class="input-group">
                        <input type="text" id="descricao" name="descricao" value="{{ $eqp1->descricao }}" disabled>
                    </div>
                </div>

                <!--  CAMPO prazo requisição DEIXAR 500  CARACTERES-->
                <div class="form-group">
                    <label class="col-md-6 control-label">Data Requisição</label>
                    <div class="col-md-6">
                        <input type="date" id="DataRequisicao" name="DataRequisicao" value="{{ $eqp1->DataRequisicao }}"
                            disabled>
                    </div>
                </div>
                <!--  CAMPO prazo requisição -->
                <div class="form-group">
                    <label class="col-md-6 control-label">Demandante</label>
                    <div class="col-md-8">
                        <input type="text" id="demandante" name="demandante" value="{{ $eqp1->demandante }}" disabled>
                    </div>
                    <div>


                    </div>
                </div>
                <div class="row justify-content-center-alert alert-success" role="alert">
                    <h4 class="alert-heading">Exclusão!!</h4>
                    <p>Esta operação não poderá ser desfeita! Confirma a exclusão do Protocolo?</p>
                    <hr>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="delete_eqp">Deletar Protocolo</button>
                    <button type="submit" class="btn btn-primary" name="cancel">Cancelar</button>
                </div>

            </div>
        </form>
    </div>
@endsection
