@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">face</i>
                            </span>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="{{ __('Usuario ou Email...') }}"
                            value="{{ old('email', null) }}" required autocomplete="username" autofocus>
                    </div>
                    @if ($errors->has('email'))
                    <div id="username-error" class="error text-danger pl-3" for="email" style="display: block;">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">lock_outline</i>
                            </span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="{{ __('Password...') }}" required autocomplete="current-password">
                    </div>
                    @if ($errors->has('password'))
                    <div id="password-error" class="error text-danger pl-3" for="password"
                        style="display: block;">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
 
            

                <div class="form-check mr-auto ml-3 mt-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"
                            {{ old('remember') ? 'checked' : '' }}> {{ __('Lembrar') }}
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
          
                <div class="conteudo-modal-title text-center">

                <div class="row justify-content-center ">
                    <div class="col-md-8">
                    <button type="submit" class="btn-hover btn btn-primary">
                        {{ __('Entrar') }}
                    </button>
                   
                        <div class="justify-content-center">
                    @if (Route::has('password.request'))
                    <a class="forgot-password btn btn-link " href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                    @endif
                    
                  {{--    <p class="register text-center">Não possui conta?</p> 
                    <a href="/register">Registrar</a>
                </div>
            </div>
            

       
    
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Login') }}
</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">

            <div class="col-md-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-8">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Senha">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Lembrar senha') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8">
                <button type="submit" class="btn-hover btn btn-primary">
                    {{ __('Entrar') }}
                </button>

                @if (Route::has('password.request'))
                <a class="forgot-password btn btn-link " href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>
                @endif
                <p class="register text-center">Não possui conta? <a href="/register">Registrar</a></p>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div> --}}
</div>
@endsection
