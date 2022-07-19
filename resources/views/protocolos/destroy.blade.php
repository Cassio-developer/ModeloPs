@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

        <h1>Deletar Cadastro protocolo</h1>
        <form action={{ route('equipamento.destroy', ['equipamento1' => $eqp1->id]) }} method="post">
            @csrf
            <!--declarar igual no delete eqp1 -->
            @method('DELETE')
            <input type="hidden" id="redirect_to" name="redirect_to" value={{ URL::previous() }}>
           
          
            <!--  CAMPO numero de ptotocolo -->
            <div class="form-group">
                <label for="numero" class="control-label">Numero do Protocolo</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="numero" name="nome"
                        value="{{ isset($eqp1->numero) ? $eqp1->numero : old('numero') }}"disabled>
                </div>

                 <!--  CAMPO  descrição do Protocolo-->
                <div class="form-group">
                    <label for="campoprotocolo" class="control-label">Descrição do Protocolo</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="campoprotocolo" name="campoprotocolo"
                            value="{{ isset($eqp1->campoprotocolo) ? $eqp1->campoprotocolo : old('campoprotocolo') }}"disabled>
                    </div>
                  
                    <!--  CAMPO prazo requisição DEIXAR 500  CARACTERES-->
                    <div class="form-group">
                        <label for="descricao" class="control-label">Descrição</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="descricao" name="descricao"
                                value="{{ isset($eqp1->descricao) ? $eqp1->descricao : old('descricao') }}"disabled>
                        </div>
                    </div>

                      {{-- - Formulario DataRequisição - --}}
                    <div class="form-group">
                        <label for="DataRequisicao" class="control-label">Data Requisição</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="DataRequisicao" name="DataRequisicao"
                                value="{{ isset($eqp1->DataRequisicao) ? $eqp1->DataRequisicao : old('DataRequisicao') }}"disabled>
                        </div>
                    </div>
                    <!--  CAMPO pessoa demandante -->
                    <div class="form-group">
                        <label for="pessoa" class="control-label">Demandante</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="pessoa" name="pessoa"
                                value="{{ isset($eqp1->pessoa) ? $eqp1->pessoa : old('pessoa') }}"disabled>
                        </div>
                    </div>

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

