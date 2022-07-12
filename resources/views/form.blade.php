<form action="#" method="post" class="form-horizontal" id="formProduto">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Novo Cadastro</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            {{--- Formulario Nome ---}}

            <div class="form-group">
                <label for="nome" class="control-label">Nome: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo"
                        value="{{isset($cras->nome) ? $cras->nome : old('nome') }}">
                </div>
            </div>

            {{--- Formulario Endereco Cras ---}}

            <div class="form-group">
                <label for="endereco" class="control-label">Endereço: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="endereco" name="endereco"
                        placeholder="Ex: Av. Dom João Becker, 754, Centro"
                        value="{{isset($cras->endereco) ? $cras->endereco : old('endereco') }}">
                </div>
            </div>

            {{--- Formulario Telefone Cras ---}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tel" class="control-label">Telefone: *</label>
                    <div class="input-group ">
                        <input type="text" class="form-control phone_with_ddd" name="tel" id="tel"
                            value="{{isset($cras->telefone) ? $cras->telefone : old('tel') }}"
                            placeholder="(00)0000-0000" />
                    </div>
                </div>

                {{--- Formulario Telefone2 Cras ---}}

                <div class="form-group col-md-6">
                    <label for="tel2" class="control-label">Telefone:</label>
                    <div class="input-group">
                        <input type="text" class="form-control phone_with_ddd" name="tel2" id="tel2"
                            value="{{isset($cras->telefone2) ? $cras->telefone2 : old('tel2') }}"
                            placeholder="(00)0000-0000" />
                    </div>
                </div>
            </div>
            {{--- Formulario E-mail Cras ---}}

            <div class="form-group">
                <label for="email" class="control-label">E-mail: *</label>
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{isset($cras->email) ? $cras->email : old('email') }}"
                        placeholder="exemplo@exemplo.com" />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-secondary" href="#">Cancelar</a>
        </div>
    </div>
    
</form>