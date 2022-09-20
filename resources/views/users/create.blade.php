@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    @if($errors->any())

    <ul class="list-group">

        @foreach($errors->all() as $error)

        <li class="list-group-item list-group-item-danger">{{$error}}</li>

        @endforeach

    </ul>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="form-horizontal" id="formProduto"
        enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="card">
            <div class="card-header">
                <h4 class="col-12 modal-title text-center">Cadastrar novo usuário</h5>
            </div>
            <div class="container col-11">
                <input type="hidden" id="id" class="form-control">
    
        <div class="form-group">
        <div class="input">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nome">

            @error('name')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>


        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="form-group">
            <input type="string" name="cpf" id="cpf" class="form-control @error('cpf') is-invalid @enderror"
                placeholder="CPF" maxlength="14" data-mask="000.000.000-00">

            @error('cpf')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

            <div class="form-group">
            <select required="required" style="background-color: #white" class="form-control"  name="role" id="role">
            <option  value="">Nível de usuário</option>
            @if(Auth::user()->role == 3) 
              <option value="2">Administrador do Sistema</option>
            @endif
              <option value="3">Operador</option>
            </select>
            </div>

            <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" placeholder="Senha">

            @error('password')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
            </div>

            <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                autocomplete="new-password" placeholder="Confirmar senha">

            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Registrar') }}
            </button>
            

<div class="text-center">
<a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
</div>

        </div>
      
    </form>
</div>


<script>

$(document).ready(function(){


$('#cpf').mask('000.000.000-00', {reverse: true});

});
</script>


@endsection