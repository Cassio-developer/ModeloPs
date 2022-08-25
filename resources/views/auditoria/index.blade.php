@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo-modal-title text-center">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Navbar</a>
            <div>
                <!--input para pesquisar na pagina -->
                <div class="col-sm-12">
                    <form action="{{ route('auditoria') }}" method="GET">
                        {{ csrf_field() }}
                        <input type="search" class="form-control input-sm" name="search" value="{{ $search }}">
                        <button type="submit" class="btn btn-primary my-2 my-sm-0-dark" type="search">Pesquisar</button>
                    </form>
                </div>
        </nav>
        <div class="conteudo-modal-title text-center">
            <h3>Consulta aos dados de auditoria
            </h3>
            <h1>Listagem de Auditoria </h1>
            <!--if else para search -->
            @if ($search)
                <h2>Buscando por:{{ $search }}</h2>
            @else
                <strong>
                    <h2>Busca de Auditaveis:{{ $search }}</h2>
                </strong>
            @endif
            @if (count($usuarios) == 0 && $search)
                <strong class="alert alert">Não foi possivel achar cadastros para este nome: {{ $search }}! <a
                        href="{{ route('auditoria') }}">Voltar</a></strong>
            @elseif(count($usuarios) == 0)
                <p>Não há cadastros para este dado informado!</p>
            @endif
        </div>
    </div>
    </div>
    <div class="card-footer col-12 modal-title text-center">
        <!--aqui vai nome rota -->

        <!--rota para cadastro pessoas -->
    </div>

    <div class="row">
        <table class="table table-hover table table-bordered">
            <thead>
                <tr>
                    <!--verificar amanha -->

                    <th>Id</th>
                    <th>Usuario Tipo</th>
                    <th>Usuario Id</th>
                    <th>Evento</th>
                    <th>Nome Tabela</th>
                    <th>Usuario</th>
                    <th>Data e Hora</th>
                </tr>
               
            </thead>
            <tbody>
                @if (count($usuarios) == 0)
                <div><strong>Não possui registros!</strong></div>
            @else
                @foreach ($usuarios as $usuario)
                    <tr>
                        <!--verificar amanha -->
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->user_type }}</td>
                        <td>{{ $usuario->user_id }}</td>
                        <td>{{ $usuario->event }}</td>
                        <td>{{ $usuario->auditable_type }}</td>
                        <td>{{ App\Cadastropessoass::whereId($usuario->user_id)->pluck('nome') }}</td>
                        <!--nome usuario -->
                        <td>{{ date('d-m-Y H:i:s', strtotime($usuario->created)) }}</td>


                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="auditoria/{{ $usuario->id }}/detalhamento">visualizar</a>
                                </li>
                    </tr>
                    <div>

                    </div>
                @endforeach
                @endif
            </tbody>
        </table>

    @endsection
