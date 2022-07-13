@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container col-11">
        <input type="hidden" id="id" class="form-control">
        <div class="conteudo-modal-title text-center">
            <h1>Listagem de Cadastro</h1>

            <h1>Para registrar este protocolo devera primeiro ser cadastrado </h1>
            <h1>Faça seu cadastro de usuario logo abaixo </h1>
        </div>

        <div class="card-footer col-12 modal-title text-center">
            <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Cadastro Pessoas</a>

            <!--aqui vai nome rota -->
            <a href="{{ route('equipamento.create') }}" class="btn btn-primary">Cadastro Protocolo</a>
        </div>

        <div class="row">
            <table class="table" id="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Cpf</th>
                            <th>Bairro</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cadastropessoass as $cadastropessoass)
                            <td>{{ $cadastropessoass->nome }}</td>
                            <td>{{ $cadastropessoass->endereco }}</td>
                            <td>{{ $cadastropessoass->cidade }}</td>
                            <td>{{ $cadastropessoass->telefone }}</td>
                            <td>{{ $cadastropessoass->email }}</td>
                            <td>{{ $cadastropessoass->cpf }}</td>
                            <td>{{ $cadastropessoass->bairro }}</td>
                            <td>{{ $cadastropessoass->datanascimento }}</td>

                            <td>
                                <ul class="list-inline">
                                    <li>
                                        <a
                                            href="{{ route('cadastropessoass.edit', ['eqp' => $cadastropessoass]) }}">Editar</a>
                                    </li>
                                    <li>
                                        <!--aqui vai a rota do web.php -->
                                        <!--aqui vai variavel passada controller metodo delete-->
                                        <a
                                            href="{{ route('cadastropessoass.delete', ['cadastropessoass' => $cadastropessoass]) }}">Deletar</a>
                                    </li>
                                    <!--aqui vai variavel passada controller -->
                                </ul>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
            <script>
                
            </script>
        @endsection
