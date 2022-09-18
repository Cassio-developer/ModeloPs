@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar novo usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> voltar</a>
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
    </form>

    <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal">
        @csrf
        @method('PUT')

        <div class="input">
            <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror
                value="{{ old('name', $user->name) }}" autofocus autocomplete="name" autofocus placeholder="Nome">
            @error('name')
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

            </div>
     

        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}"
            class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
            autocomplete="email" autofocus placeholder="Email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror


        <input type="cpf" class="form-control" name="cpf" value="{{ old('cpf', $user->cpf) }}"
            class="form-control @error('email') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}"
            autocomplete="cpf" autofocus placeholder="cpf" data-mask="000.000.000-00">
        @error('cpf')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror



        <input type="password" class="form-control" name="password" value="{{ old('password') }}"
            class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"
            autocomplete="current-password" autofocus placeholder="password" required>

        @error('password')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror


        <input id="confirm-password-confirm" type="password" class="form-control" name="confirm-password"
            autocomplete="confirm-password" placeholder="confirme password">




        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">enviar</button>
        </div>
        </div>
    </div>



    @endsection
