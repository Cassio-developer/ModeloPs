@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <div class="container-fluid no-padding table-responsive-sm">
            <div class="conteudo-modal-title text-center">
                <h2>Criar novo Usuario</h2>
            </div>

        </div>
                    <div>
                        
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
                    </div>
            </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ops!</strong> Problemas no input!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('users.store') }}" method="POST" class="form-horizontal" id="formProduto"
        enctype="multipart/form-data">
        @csrf
        @method('POST')


        <label class="col-md-3 label-control" style="font-size: 16px!important;" for="tipo_user"></label>
        <div class="col-md-9">
            <select class="form-control dropdown" id="tipo_user" name="tipo_user" data-dropup-auto="false"
                onchange="handleInput()">
                <option value="">Selecione uma opção</option>
                <option value="Administrador-do-sistema ">Administrador do sistema </option>
                <option value="Administrador-da-TI">Administrador da TI</option>
                <option value="Admin">Operador</option>
                <div class="input">
                    <input id="name" type="text" class="form-control @error('name') Invalido @enderror"
                        name="name" autofocus placeholder="Nome">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                    <input id="email" type="email" class="form-control @error('email') Invalido @enderror"
                        name="email" autofocus placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror


                    <input type="string" name="cpf" id="cpf"
                        class="form-control @error('cpf') is-invalid @enderror" placeholder="CPF" maxlength="14"
                        data-mask="000.000.000-00" autofocus placeholder="cpf">

                    @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror


                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Senha">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                    <div>
                        <select required="required" style="background-color: #white" class="form-control" name="role"
                            id="role">
                            <option value="role">Role</option>
                            @foreach ($roles as $roles)
                                <option value="{{ $roles }}">
                                    {{ $roles }}
                                </option>
                            @endforeach
                        </select>
                        <input id="confirm-password-confirm" type="password" class="form-control" name="confirm-password"
                            autocomplete="confirm-password" placeholder="confirme password">

                    </div>
                </div>
            </div>

        
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
        </div>

        </div>
   

        <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

        <script>
            const user = document.getElementById('tipo_user');
            const operadores = document.getElementById('operadores');
            const div = document.getElementById('role');

            function handleInput() {
                if (user.value == 'Administrador-da-TI') {
                    div.disabled = false;
                    div.hidden = false;
                } else {
                    div.disable = true;
                    div.hidden = true;
                }
            }
        </script>

    @endsection
