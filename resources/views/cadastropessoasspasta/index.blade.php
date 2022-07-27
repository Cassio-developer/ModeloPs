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
                        <button type="submit" class="btn btn-primary my-2 my-sm-0-dark" type="search">Pesquisar</button>
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
            <span>Não foi possivel achar cadastros para este nome: {{ $search }}! <a
                    href="{{ route('cadastropessoass.index') }}">Voltar</a></span>
        @elseif(count($cadastropessoass) == 0)
            <p>Não há cadastros para este dado informado!</p>
        @endif
    </div>
    <div>
        @foreach ($cadastropessoass as $cadastropessoas)
        @endforeach
        <div class="card-footer col-12 modal-title text-center">

            <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Cadastro Pessoas</a>

            <!--aqui vai nome rota -->
            <a href="{{ route('registrar') }}" class="btn btn-primary">Cadastro Protocolo</a>
        </div>
    </div>
    <div class="row">
        <table id="grid-basic" class="w3-table-all w3-card-4  table-hover table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nome </th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Data</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Compl:</th>
                    
                    <!--  <th scope="col">E-mail</th>
                                    <th scope="col">Complemento</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($cadastropessoass as $cadastropessoas)
                    <td>{{ $cadastropessoas->nome }}</td>
                    <td>{{ $cadastropessoas->endereco }}</td>
                    <td>{{ $cadastropessoas->cidade }}</td>
                    <td>{{ $cadastropessoas->telefone }}</td>
                    <td>{{ $cadastropessoas->cpf }}</td>
                    <td>{{ $cadastropessoas->bairro }}</td>
                    <td>{{ $cadastropessoas->datanascimento }}</td>
                    <td>{{ $cadastropessoas->sexo }}</td>
                    <td>{{ $cadastropessoas->complemento }}</td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('cadastropessoass.edit', ['eqp' => $cadastropessoas]) }}">Editar</a>
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
