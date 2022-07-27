@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <h1>Deletar Cadastro protocolo</h1>
                    <form action={{ route('deleteprot', ['id' => $protocolo]) }} method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>
                        <div>
                            <div class="form-group col-md-3">
                                <label for="cadastropessoass_id" class="control-label">Pessoa</label>
                                <select name="cadastropessoass_id" class="form-control" style="width:250px" 
                                    id="cadastropessoass_id">
                                    @foreach ($pessoa as $pessoa)
                                        <option value="{{ $pessoa->id }}"
                                            @if (old('nome_id') == $pessoa->nome) {{ 'selected' }} @endif>
                                            {{ $pessoa->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--  CAMPO  descrição do Protocolo-->
                        <div class="form-group">
                            <label class="col-md-6 control-label">Digite descrição do Protocolo</label>
                            <div class="col-md-12">
                                <input type="text" name="descricao" class="form-control"
                                    placeholder="Ex: Protocolo será sobre, demanda das obras Seman."
                                    value="{{ isset($protocolo) ? $protocolo->descricao : old('descricao') }}">

                            </div>

                            {{-- - Formulario DataRequisição - --}}

                            <div class="form-group col-md-4">
                                <label for="DataRequisicao" class="control-label">Data desta Requisição</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="DataRequisicao" id="DataRequisicao"
                                        placeholder="ex: 02/05/1989"
                                        value="{{ isset($protocolo) ? $protocolo->DataRequisicao : old('DataRequisicao') }}">

                                </div>

                                <!--  CAMPO prazo Prazo do Protocolo-->
                                <div class="form-group">
                                    <label for="prazo">Digite Prazo do Protocolo</label>
                                    <div class="col-md-6">
                                        <input type="text" name="prazo" class="form-control"
                                            placeholder="Ex: 20/01/2022"
                                            value="{{ isset($protocolo) ? $protocolo->prazo : old('prazo') }}">

                                    </div>

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
