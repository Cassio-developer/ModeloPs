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
    <div class="conteudo">
        <div class="card-footer col-12 modal-title-center">
            @if (session('mensagem'))
                <div class="alert alert-success">
                    <p>{{ session('mensagem') }}</p>
                </div>
            @endif
            <h3 class="col-12 modal-title text-center">Cadastro de Pessoa</h3>

            @include('cadastropessoasspasta._form3')
        </div>
    </div>
@endsection
