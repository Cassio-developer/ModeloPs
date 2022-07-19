@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administração de Usuarios</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="conteudo-modal-title text-center">
                    <h3>Incluir Usuarios</h3>
                </div>
            
                @if (Request::is('*/edit'))@endif
                    <form action={{ url('usuarios/add') }} method="post">
                        @csrf
                    
                        <div class="input">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $usuario->name }}">
        
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
        
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $usuario->email }}">
        
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
          
                            <input type="string" name="cpf" id="cpf" class="form-control @error('cpf') is-invalid @enderror"
                               >
        
                            @error('cpf')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
        
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" value="{{ $usuario->password }}">
        
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                            
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"value="{{ $usuario->password }}">
        
                            <button type="submit">
                                {{ __('Adicionar') }}
                            </button>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
