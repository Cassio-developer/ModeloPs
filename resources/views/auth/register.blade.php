@extends('layouts.master')

@section('content')

        <div class="form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                @if($errors->any())

                
                <div class="card">
                    <div class="card-header">
                        <ul class="list-group">

                            @foreach($errors->all() as $error)
        
                            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        
                            @endforeach
                        </ul>
                        @endif
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
                    @if(Auth::user()->role == 1) 
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
                </div>
              
            </form>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){


  $('#cpf').mask('000.000.000-00', {reverse: true});

  });
    </script>
    
    
@endsection