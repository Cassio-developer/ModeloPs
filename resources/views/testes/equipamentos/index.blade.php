@extends('layouts.master')
@section('title', 'EXEMPLO')
<div>
    <h1>Listagem de Cadastro</h1>
    <h1>Para registrar este protocolo devera primeiro ser cadastrado </h1>
    <h1>Faça seu cadastro de usuario logo abaixo </h1>
</div>
<div class="card-footer col-12 modal-title text-center">
    <a href="{{ route('CadastroPESSOAS.create') }}" class="btn btn-primary">Novo Cadastro</a>

    <!--aqui vai nome rota -->
    <a href="{{ route('Protocolos.create') }}" class="btn btn-primary">Novo Cadastro</a>
    <h3>Link para Cadastro Protocolo</h3>
</div>

<div class="row">
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
                <th>datanascimento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $variavel)
                <tr>
                    <td>{{ $variavel->id }}</td>
                    <td>{{ $variavel->nome }}</td>
                    <td>{{ $variavel->endereco }}</td>
                    <td>{{ $variavel->cidade }}</td>
                    <td>{{ $variavel->telefone }}</td>
                    <td>{{ $variavel->email }}</td>
                    <td>{{ $variavel->cpf }}</td>
                    <td>{{ $variavel->bairro }}</td>
                    <td>{{ $variavel->datanascimento }}</td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('CadastroPESSOAS.edit', ['variavel' => $variavel]) }}">Editar</a>
                            </li>
                            <li>
                                <a href="{{ route('CadastroPESSOAS.delete', ['variavel' => $variavel]) }}">Deletar</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
