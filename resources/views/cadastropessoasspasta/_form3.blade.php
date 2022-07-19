<form action={{ route('cadastropessoass.store') }} method="post">
    @csrf

    <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
    <div class="container col-11">
        <input type="hidden" id="id" class="form-control">
        <!-- mensagem de erro -->
     
        {{-- - Formulario Nome - --}}

        <div class="form-group">
            <label for="nome" class="control-label">Nome: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" value="{{ old('nome') }}" />
                    @error('nome')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>
        </div>

        {{-- - Formulario Endereco Cras - --}}

        <div class="form-group">
            <label for="endereco" class="control-label">Endereço: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="endereco" name="endereco"
                    placeholder="Ex: Av. Dom João Becker, 754, Centro" value="{{ old('endereco') }}" />
                    @error('endereco')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>
                
        </div>
        <div class="form-group">
            <label for="endereco" class="control-label">bairro: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Ex:  Centro"
                    value="{{ old('bairro') }}" />
                    @error('bairro')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>
        </div>
        {{-- - Formulario cidade - --}}

        <div class="form-group">
            <label for="cidade" class="control-label">Cidade: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex: Porto alegre"
                    value="{{ old('cidade') }}" />
                    @error('cidade')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>

        </div>

        {{-- - Formulario Telefone - --}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tel" class="control-label">Telefone: *</label>
                <div class="input-group ">
                    <input type="text" class="form-control phone_with_ddd" name="telefone" id="telefone"
                        placeholder="(00)0000-0000" value="{{ old('telefone') }}" />
                </div>
            </div>

            {{-- - Formulario nascimento - --}}

            <div class="form-group col-md-4">
                <label for="datanascimento" class="control-label">Data de Nascimento:</label>
                <div class="input-group">
                    <input type="date" class="form-control" name="datanascimento" id="datanascimento"
                        placeholder="ex: 02/05/1988" value="{{ old('datanascimento') }}" />
                </div>
            </div>
            {{-- - Formulario E-mail - --}}



            <div class="col-md-6 form-group">
                <label for="email" class="control-label">E-mail:</label>
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email "
                        placeholder="exemplo@exemplo.com" value="{{ old('email') }}" />
                </div>
            </div>

            <!--  CAMPO CPF -->
            <div class="form-group">
                <label class="col-md-10 control-label">CPF</label>
                <div class="col-md-10">
                    <input type="text" name="cpf" class="form-control" placeholder="ex:015.125.120.50"
                        value="{{ old('cpf') }}" />
                </div>
            </div>


            <!--  CAMPO complemento -->
            <div class="col-md-2 form-group">
                <label for="complemento" class="control-label">Complemento</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="complemento" name="complemento"
                        placeholder="Ex: Casa,Apt" value="{{ old('complemento') }}" />
                </div>
            </div>

            <!--  CAMPO sexo -->

            <!--  colocar aqui para lembrar tambem "/> -->
            <div class="form-group col-md-6">
                <label for="sexo" class="control-label">Sexo</label>
                <select name="sexo" class="form-control">
                    <option value="">Selecione Aqui</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Feminino</option>
                    <select>
            </div>

            <!--  CAMPO Numero -->

            <div class="form-group col-md-4">
                <label for="numero" class="control-label">Digite aqui Numero:</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="numero" id="numero" placeholder="ex: 90"
                        value="{{ old('numero') }}" />


                </div>
