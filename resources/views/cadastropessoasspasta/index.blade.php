@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    @role('admin')
        <strong class="alert alert"> Acesso de Admin!!<a></strong>

        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        </head>
        <div class="conteudo-modal-title text-center">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Navbar</a>
                <div>
                    <!--input para pesquisar na pagina -->
                    <div class="col-sm-12">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="{{ $search }}" class="form-control"
                                    placeholder="Pesquisar..." name="search">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>

            </nav>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="msg" role="alert"> {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="conteudo-modal-title text-center">
            <h3>Para registrar o protocolo devera primeiro ser cadastrado! Faça seu cadastro de usuario logo abaixo</h3>
            <h1>Listagem de Cadastro</h1>

            @if ($search)
                <h2>Buscando por:{{ $search }}</h2>
            @else
                <h2>Proximos Cadastros:{{ $search }}</h2>
            @endif
            @if (count($cadastropessoass) == 0 && $search)
                <strong class="alert alert">Não foi possivel achar cadastros para este nome: {{ $search }}! <a
                        href="{{ route('cadastropessoass.index') }}">Voltar</a></strong>
            @elseif(count($cadastropessoass) == 0)
                <p>Não há cadastros para este dado informado!</p>
            @endif
        </div>
        </div>
        <div>
            @foreach ($cadastropessoass as $cadastropessoas)
            @endforeach
            <div class="card-footer col-12 modal-title text-center">



                <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Cadastro Pessoas</a>

                <a href="{{ route('registrar') }}" class="btn btn-primary">Cadastro Protocolo</a>

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
                            <td class="text-primary">{{ $cadastropessoas->created_at->toFormattedDateString() }}</td>
                            <td>{{ $cadastropessoas->sexo }}</td>
                            <td>{{ $cadastropessoas->complemento }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li>
                                        <a href="{{ route('cadastropessoass.edit', ['eqp' => $cadastropessoas]) }}">Editar</a>
                                    </li>
                                    <li>

                                        <a
                                            href="{{ route('cadastropessoass.delete', ['cadastropessoass' => $cadastropessoas]) }}">Deletar</a>
                                    </li>
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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>

            <script>
                $(document).ready(function() {
                    $('#cadastropessoass').DataTable({
                        select: false,
                        responsive: true,
                        "order": [
                            [0, "asc"]
                        ],
                        "info": false,
                        "sLengthMenu": false,
                        "bLengthChange": false,
                        "oLanguage": {

                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de START até END de TOTAL registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de MAX registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "MENU resultados por página",
                            "sLoadingRecords": "Carregando...",
                            "sProcessing": "Processando...",
                            "sZeroRecords": "Nenhum registro encontrado",

                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                            },
                            "oAria": {
                                "sSortAscending": ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
                            }
                        }
                    });
                });
            </script>
        @else
            <strong class="alert alert">Você não tem permissões para Cadastro de Pessoas!! Volte a sua area!<a></strong>
        @endrole
    @endsection
