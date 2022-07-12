@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo">
        <h1>Listagem de Cadastro</h1>
        <h3>Para
            que seja registrado o protocolo, portanto, primeiro a pessoa demandante
            terá de ser cadastrada no cadastro de pessoas!.</h3>
    </div>
    <!--aqui vai nome rota -->
    <a href="{{ route('CadastroPESSOAS.create') }}" class="btn btn-primary">Novo Cadastro</a>
    <h3>Link para Cadastro pessoas</h3>
    </div>

    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Campoprotocolo</th>
                    <th>Descrição</th>
                    <th>Data Requisição</th>
                    <th>Demandante</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($protosss as $proto)
                    <tr>
                        <td>{{ $proto->id }}</td>
                        <td>{{ $proto->nome }}</td>
                        <td>{{ $proto->campoprotocolo }}</td>
                        <td>{{ $proto->descricao }}</td>
                        <td>{{ $proto->DataRequisicao }}</td>
                        <td>{{ $proto->demandante }}</td>

                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="{{ route('Protocolos.edit', ['proto' => $proto]) }}">Editar</a>
                                </li>
                                <li>
                                    <!--aqui vai a rota do web.php -->
                                    <a href="{{ route('Protocolos.delete', ['proto' => $proto]) }}">Deletar</a>
                                </li>
                                <!--aqui vai variavel passada controller -->
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endsection
