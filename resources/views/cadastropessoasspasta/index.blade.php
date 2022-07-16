@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <div class="conteudo-modal-title text-center">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Navbar</a>
            <div>
                <!--input para pesquisar na pagina -->
                <div class="col-sm-12">
                    <form action="{{ route('cadastropessoass.index') }}" method="GET">
                        {{ csrf_field() }}
                        <input type="search" class="form-control input-sm" name="search" value="{{ $search }}">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0-dark bg-primary"
                            type="search">Pesquisar</button>
                    </form>
                </div>
        </nav>
    </div>
    <div class="conteudo-modal-title text-center">
        <h3>Para registrar este protocolo devera primeiro ser cadastrado Faça seu cadastro de usuario logo abaixo</h3>
        <h1>Listagem de Cadastro</h1>

        <!--if else para search -->
        @if ($search)
            <h2>Buscando por:{{ $search }}</h2>
        @else
            <h2>Proximos Cadastros:{{ $search }}</h2>
        @endif
        @if (count($cadastropessoass) == 0 && $search)
            <p>Não foi possivel achar cadastros para este nome: {{ $search }}! <a
                    href="{{ route('cadastropessoass.index') }}">Voltar</a></p>
        @elseif(count($cadastropessoass) == 0)
            <p>Não há cadastros para este dado informado!</p>
        @endif
        <div>
            @foreach ($cadastropessoass as $cadastropessoas)
            @endforeach
            <div class="card-footer col-12 modal-title text-center">

                <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Cadastro Pessoas</a>

                <!--aqui vai nome rota -->
                <a href="{{ route('equipamento.create') }}" class="btn btn-primary">Cadastro Protocolo</a>
            </div>
        </div>
        <div class="row">
            <table class="table" id="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Cpf</th>
                            <th>Bairro</th>
                            <th>Data</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cadastropessoass as $cadastropessoas)
                            <td>{{ $cadastropessoas->nome }}</td>
                            <td>{{ $cadastropessoas->endereco }}</td>
                            <td>{{ $cadastropessoas->cidade }}</td>
                            <td>{{ $cadastropessoas->telefone }}</td>
                            <td>{{ $cadastropessoas->email }}</td>
                            <td>{{ $cadastropessoas->cpf }}</td>
                            <td>{{ $cadastropessoas->bairro }}</td>
                            <td>{{ $cadastropessoas->datanascimento }}</td>
                            <td>{{ $cadastropessoas->sexo }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li>
                                        <a
                                            href="{{ route('cadastropessoass.edit', ['eqp' => $cadastropessoas]) }}">Editar</a>
                                    </li>
                                    <li>
                                        <!--aqui vai a rota do web.php -->
                                        <!--aqui vai variavel passada controller metodo delete-->
                                        <a
                                            href="{{ route('cadastropessoass.delete', ['cadastropessoass' => $cadastropessoas]) }}">Deletar</a>
                                    </li>
                                    <!--aqui vai variavel passada controller -->
                                </ul>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
            <div>
            </div>
        </div>
    @endsection
