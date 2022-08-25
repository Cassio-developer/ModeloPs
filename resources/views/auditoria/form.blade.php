

@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container col-11">
                <h2>Detalhamento dos registros de auditoria</h2>
                <!-- rota-->
                    <div>
                        <div class="form-group col-md-3">
                            <label for="user_type" class="control-label">Usuario Tipo</label>
                            <input type="text" class="form-control" name="user" id="user_type"
                                value=" {{ isset($usuarios) ? $usuarios->user_type : old('user_type') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="user_id" class="control-label">Usuario Id</label>
                            <input type="text" class="form-control" name="user" id="user_type"
                                value=" {{ isset($usuarios) ? $usuarios->user_id : old('user_id') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="auditable" class="control-label"></label>
                            <input type="text" class="form-control" name="user" id="auditable"
                                value=" {{ isset($usuarios) ? $usuarios->auditable : old('auditable') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="url" class="control-label">Url</label>
                            <input type="text" class="form-control" name="user" id="url"
                                value=" {{ isset($usuarios) ? $usuarios->url : old('url') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="tags" class="control-label">tags</label>
                            <input type="text" class="form-control" name="tags" id="tags"
                                value=" {{ isset($usuarios) ? $usuarios->tags : old('tags') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="ip_address" class="control-label">Ip</label>
                            <input type="text" class="form-control" name="user" id="ip_address"
                                value=" {{ isset($usuarios) ? $usuarios->ip_address : old('ip_address') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-7">
                            <label for="old_values" class="control-label">Valores Antigos</label>
                            <input type="text" class="form-control" name="user" id="old_values"
                                value=" {{ isset($usuarios) ? $usuarios->old_values : old('old_values') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-7">
                            <label for="new_values" class="control-label">Novos Valores</label>
                            <input type="text" class="form-control" name="user" id="new_values"
                                value=" {{ isset($usuarios) ? $usuarios->new_values : old('new_values') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="event" class="control-label">Evento</label>
                            <input type="text" class="form-control" name="user" id="event"
                                value=" {{ isset($usuarios) ? $usuarios->event : old('event') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-3">
                            <label for="attribute" class="control-label">Id</label>
                            <input type="text" class="form-control" name="attribute" id="user"
                                value=" {{ isset($usuarios) ? $usuarios->attribute : old('attribute') }}"readonly>
                                
                            <!--  readonly é igual ao required-->
                        </div>
                    </div>
                    <!--  CAMPO  descrição do Protocolo-->
                    <div class="form-group">
                        <label class="col-md-6 control-label">Navegador</label>
                        <div class="col-md-12">
                            <input type="text" name="user_agent" class="form-control"
                                placeholder="Ex: Protocolo será sobre, demanda das obras Seman."
                                value="{{ isset($usuarios) ? $usuarios->user_agent : old('user_agent') }}"readonly>
                        </div>
                    </div>

                    {{-- - Formulario DataRequisição - --}}

                    <div class="form-group col-md-4">
                        <label for="updated_at" class="control-label">Data da Atualização</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="updated_at " id="updated_at"
                                value="{{ isset($usuarios->updated_at ) ? date('Y-m-d', strtotime($usuarios->updated_at)) : old('updated_at') }}"readonly>

                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="DataRequisicao" class="control-label">Data Criação</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="created_at " id="created_at"
                                value="{{ isset($usuarios->created_at ) ? date('Y-m-d', strtotime($usuarios->created_at)) : old('created_at') }}"readonly>

                        </div>
                    </div>
                    <!--  CAMPO prazo  Prazo do Protocolo-->
                    <div class="form-group">
                        <label for="prazo">Tabela</label>
                        <div class="col-md-4">
                            <input type="text" name="auditable_type" class="form-control"
                                value="{{ isset($usuarios) ? $usuarios->auditable_type : old('auditable_type') }}"readonly>

                        </div>
                    </div>

                    <div class="col-12 modal-title text-center">
                            <div class="conteudo-modal-title text-center">
                            <button class="btn btn-primary"> <a href="{{ url('auditoria') }}">Voltar</a></button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

@endsection
