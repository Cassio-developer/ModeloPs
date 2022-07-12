<form action={{ route('cadastropessoass.store') }} method="post">
    @csrf

    <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
    <div class="container col-11">
        <input type="hidden" id="id" class="form-control">

        {{-- - Formulario Nome - --}}

        <div class="form-group">
            <label for="nome" class="control-label">Nome: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nome" name="nome"
                    placeholder="Nome completo"required>
            </div>
        </div>

        {{-- - Formulario Endereco Cras - --}}

        <div class="form-group">
            <label for="endereco" class="control-label">Endereço: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="endereco" name="endereco"required
                    placeholder="Ex: Av. Dom João Becker, 754, Centro">
            </div>
        </div>
        <div class="form-group">
            <label for="endereco" class="control-label">bairro: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="bairro" name="bairro"required
                    placeholder="Ex:  Centro">
            </div>
        </div>
        {{-- - Formulario cidade - --}}

        <div class="form-group">
            <label for="cidade" class="control-label">Cidade: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="cidade" name="cidade"required
                    placeholder="Ex: Porto alegre">
            </div>

        </div>

        {{-- - Formulario Telefone - --}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tel" class="control-label">Telefone: *</label>
                <div class="input-group ">
                    <input type="text" class="form-control phone_with_ddd" name="telefone" id="telefone"
                        placeholder="(00)0000-0000" />
                </div>
            </div>

            {{-- - Formulario nascimento - --}}

            <div class="form-group col-md-6">
                <label for="datanascimento" class="control-label">Data de Nascimento:</label>
                <div class="input-group">
                    <input type="date" class="form-control" name="datanascimento" id="datanascimento"
                        placeholder="ex: 02/05/1988" />
                </div>
            </div>
            {{-- - Formulario E-mail - --}}

            <div class="col-md-6 form-group">
                <label for="email" class="control-label">E-mail:</label>
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email "
                        placeholder="exemplo@exemplo.com" />
                </div>
            </div>

            <!--  CAMPO CPF -->
            <div class="form-group">
                <label class="col-md-8 control-label">CPF</label>
                <div class="col-md-10">
                    <input type="text" name="cpf" class="form-control" required placeholder="ex:000000000000">
                </div>
            </div>


            <!--  CAMPO complemento -->
            <div class="col-md-2 form-group">
                <label for="complemento" class="control-label">Complemento</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="complemento" name="complemento"
                        placeholder="Ex: Casa,Apt">
                </div>
            </div>

            <!--  CAMPO complemento -->
            <div class="form-group col-lg-3">
                <label for="option">Selecione Sexo</label required>
                <div class="input-group">
                    <select class="form-control">
                        <option value="">Selecione Aqui</option>
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                    </select>
                    <!--  CAMPO Numero -->

                    <div class="form-group col-md-6">
                        <label for="numero" class="control-label">Digite aqui Numero:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="numero" id="numero"
                                placeholder="ex: 90" />
                        </div>
                    </div>
