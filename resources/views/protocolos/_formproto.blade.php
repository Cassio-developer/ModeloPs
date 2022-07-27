<form action="{{ route('saveprot') }}" method="POST" class="form-horizontal" id="formProduto" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-header">

        </div>
        <h2 class="col-12 modal-title text-center">Todos Campos são obrigatorios!</h2>
        <h3 class="col-12 modal-title text-center"> Para que seja registrado o protocolo, portanto, primeiro a pessoa
            demandante
            terá de ser cadastrada no cadastro de pessoas!.</h3>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">


            <!--  CAMPO numero de ptotocolo -->
            <div class="form-group">
                <label class="col-md-6 control-label">Escolha Nome Demandante</label>
                <div class="col-md-6">
                    <!--  name="pessoa" colocar depois, coloquei par fazer teste pois deu erro sql -->

                    <!--  aqui vai o select -->
                    </select>
                    <div class="form-group col-md-3">
                        <label for="cadastropessoass_id" class="control-label">Pessoa</label>
                        <select name="cadastropessoass_id" class="form-control" style="width:250px" required
                            id="cadastropessoass_id">
                            @foreach ($pessoas as $pessoa)
                                <option value="{{ $pessoa->id }}"
                                    @if (old('nome_id') == $pessoa->nome) {{ 'selected' }} @endif>
                                    {{ $pessoa->nome }}</option>
                            @endforeach
                        </select>
                        @error('pessoa')
                            <div class="alert alert-danger">{{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!--  CAMPO  descrição do Protocolo-->
                    <div class="form-group">
                        <label class="col-md-6 control-label">Digite descrição do Protocolo</label>
                        <div class="col-md-12">
                            <input type="text" name="descricao" class="form-control"
                                placeholder="Ex: Protocolo será sobre, demanda das obras Seman."
                                value="{{ isset($eqp1) ? $eqp1->descricao : old('descricao') }}">
                            @error('descricao')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    {{-- - Formulario DataRequisição - --}}

                    <div class="form-group">
                        <label for="DataRequisicao" class="control-label">Data desta Requisição</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="DataRequisicao" id="DataRequisicao"
                                placeholder="ex: 02/05/1989"
                                value="{{ isset($eqp1) ? $eqp1->DataRequisicao : old('DataRequisicao') }}">
                            @error('DataRequisicao')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!--  CAMPO Prazo do Protocolo-->
                        <div class="form-group">
                            <label for="prazo">Digite Prazo do Protocolo</label>
                            <div class="col-md-8">
                                <input type="text" name="prazo" class="form-control" placeholder="Ex: 20/01/2022"
                                    value="{{ isset($eqp1) ? $eqp1->prazo : old('prazo') }}">
                                @error('prazo')
                                    <div class="alert alert-danger">{{ $message }}
                                    @enderror
                                </div>

</form>
</div>
</div>
