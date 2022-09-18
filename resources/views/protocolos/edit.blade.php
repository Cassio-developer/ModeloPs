@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container col-11">
                <h3>Editar Protocolos</h3>
                <form action={{ route('alterar_protocolo', ['id' => $protocolo]) }} method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="cadastropessoass_id" class="control-label">Pessoa</label>
                            <input type="text" class="form-control" name="cadastropessoass_id" id="cadastropessoass_id"
                                value=" {{ $protocolo->cadastropessoass->nome }} " readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label">Digite descrição do Protocolo</label>
                        <div class="col-md-12">
                            <input type="text" name="descricao" class="form-control"
                                placeholder="Ex: Protocolo será sobre, demanda das obras Seman."
                                value="{{ isset($protocolo) ? $protocolo->descricao : old('descricao') }}">
                        </div>
                    </div>

                    {{-- - Formulario DataRequisição - --}}

                    <div class="form-group col-md-4">
                        <label for="DataRequisicao" class="control-label">Data desta Requisição</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="DataRequisicao" id="DataRequisicao"
                                value="{{ isset($protocolo->DataRequisicao) ? date('Y-m-d', strtotime($protocolo->DataRequisicao)) : old('DataRequisicao') }}">

                        </div>
                    </div>
                    <!--  CAMPO prazo  Prazo do Protocolo-->
                    <div class="form-group">
                        <label for="prazo">Digite Prazo do Protocolo</label>
                        <div class="col-md-4">
                            <input type="text" name="prazo" class="form-control"
                                value="{{ isset($protocolo) ? $protocolo->prazo : old('prazo') }}">

                        </div>
                    </div>

                    <div class="col-12 modal-title text-center">
                        <button type="submit" class="btn btn-primary" name="edit_eqp">Editar Protocolo</button>

                        <button type="submit" class="btn btn-primary" name="cancel">Cancelar</button>

                    </div>
            </div>
            </form>
        </div>
    </div>

@endsection
