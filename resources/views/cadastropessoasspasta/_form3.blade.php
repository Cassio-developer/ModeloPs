@php
$form_mode = !isset($form_mode) ? 'default' : $form_mode;
switch ($form_mode) {
    case 'delete':
        $action = route('cadastropessoass.destroy', ['cadastropessoas' => $eqp->id]);
        $bot_label = 'Deletar';
        break;
    case 'edit':
        $action = route('cadastropessoass.update', ['cadastropessoas' => $eqp]);
        $bot_label = 'Editar';
        break;
    default:
        $action = route('cadastropessoass.store');
        $bot_label = 'Cadastrar';
        break;
}
@endphp
<form action={{ $action }} method="post">
    @csrf

    @if ($form_mode == 'delete')
        @method('DELETE')
    @endif
    @if ($form_mode == 'edit')
        @method('PUT')
    @endif

   
    <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
    <div class="container col-11">




        <div class="form-group">
            <label for="nome" class="control-label">Nome: *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo"
                    value="{{ isset($eqp) ? $eqp->nome : old('nome') }}" {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="endereco" class="control-label">Rua: </label>
            <div class="input-group">
                <input type="text" class="form-control" id="endereco" name="endereco"
                    placeholder="Ex: Av. Dom João Becker, 754, Centro"
                    value="{{ isset($eqp) ? $eqp->endereco : old('endereco') }}"
                    {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                    @error('endereco')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
            </div>

        </div>
        <div class="form-group">
            <label for="bairro" class="control-label">bairro:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Ex:  Centro"
                    value="{{ isset($eqp) ? $eqp->bairro : old('bairro') }}"
                    {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                    @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="cidade" class="control-label">Cidade:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex: Porto alegre"
                    value="{{ isset($eqp) ? $eqp->cidade : old('cidade') }}"
                    {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                    @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tel" class="control-label">Telefone:</label>
                <div class="input-group ">
                    <input type="text" class="form-control phone_with_ddd" name="telefone" id="telefone"
                        placeholder="(00)0000-0000" value="{{ isset($eqp) ? $eqp->telefone : old('telefone') }}"
                        {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                        @error('telefone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="datanascimento" class="control-label">Data de Nascimento:</label>
                <div class="input-group">
                    <input type="date" class="form-control" name="datanascimento" id="datanascimento"
                        placeholder="ex: 02/05/1988"
                        value="{{ isset($eqp) ? date('Y-m-d', strtotime($eqp->DataRequisicao)) : old('DataRequisicao') }}"
                        {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                    <!--pra passar a data recebida usar ? date('Y-m-d', strtotime($eqp->DataRequisicao))  -->
                    @error('datanascimento')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                </div>
            </div>
        </div>


        <div class="form-group col-md-6">
            <label for="cpf" class="control-label">Cpf</label>
            <div class="input-group">
                <input type="number" class="form-control" name="cpf" id="cpf"
                    placeholder="ex: 000.000.000.00" value="{{ isset($eqp) ? $eqp->cpf : old('cpf') }}"
                    {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="numero" class="control-label">Numero:</label>
            <div class="input-group">
                <input type="number" class="form-control" @error('numero') is-invalid @enderror name="numero" id="numero" placeholder="ex: 90"
                    value="{{ isset($eqp) ? $eqp->numero : old('numero') }}"
                    {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                    @error('numero')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
            </div>

        </div>


        <div class="col-md-6 form-group">
            <label for="email" class="control-label">E-mail:</label>
            <div class="input-group">
                <input type="email" class="form-control" name="email" id="email "
                    placeholder="exemplo@exemplo.com" value="{{ isset($eqp) ? $eqp->email : old('email') }}"
                    {{ $form_mode == 'delete' ? 'disabled' : '' }}>

            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="sexo" class="control-label">Sexo</label>
            <select name="sexo" class="form-control" @error('sexo') is-invalid @enderror value="{{ isset($eqp) ? $eqp->sexo : old('sexo') }}"
                {{ $form_mode == 'delete' ? 'disabled' : '' }}>
                <option value="">Selecione Aqui</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <select>
                    @error('sexo')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
        </div>


        <div class="col-md-6 form-group">
            <label for="complemento" class="control-label">Complemento</label>
            <div class="input-group">
                <input type="text" class="form-control" id="complemento" name="complemento"
                    placeholder="Ex: Casa,Apt" value="{{ isset($eqp) ? $eqp->complemento : old('complemento') }}"
                    {{ $form_mode == 'delete' ? 'disabled' : '' }}>

            </div>
        </div>
        @if ($form_mode == 'delete')
            <div class="alert alert-danger" role="alert">Esta operação não poderá
                ser desfeita! Confirma a exclusão ?</div>
        @endif
        <div class="col-12 modal-title text-center">

            <input type="submit" class="btn btn-primary" name="save_eqp" value="{{ $bot_label }}">
            <input type="submit" class="btn btn-primary" name="cancel" value="Cancelar">
        </div>
</form>
 

<script type="text/javascript">
    function btnClick(event) {
        event.preventDefault();
        alert("Operação cancelada pelo usuário");
        window.history.back();
    }
</script>
