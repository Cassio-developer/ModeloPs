@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')


    <div class="conteudo">
        <div class="card-footer col-12 modal-title-center">
            @if(session('mensagem'))
            <div class="alert alert-success">
                <p>{{session('mensagem')}}</p>
            </div>
        @endif 
            <h3 class="col-12 modal-title text-center">Cadastro de Pessoa</h3>
    
          @include('cadastropessoasspasta._form3')
        </div>
    </div>
    
 
@endsection
