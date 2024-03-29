@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <div class="container-fluid no-padding table-responsive-sm">
        <table class="table table-striped nowrap" style="width:100%" id="protosss">
            <div class="conteudo-modal-title text-center">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand"></a>
                    <div>
                        <form action="{{ route('tabelaprotocolo') }}" method="GET">
                            {{ csrf_field() }}
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
                <div class="card-body">
                    @if (session('message'))
                        <div class="msg" role="alert"> {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="conteudo-modal-title text-center">
                    <h3>Para que seja registrado o protocolo, portanto, primeiro a pessoa demandante terá de ser cadastrada
                        no
                        cadastro de pessoas!.</h3>
                    <h1>Listagem de Cadastro Protocolos</h1>
                    <!--if else para search -->
                    @if ($search)
                        <h2>Buscando por:{{ $search }}</h2>
                    @else
                        <strong>
                            <h2>Busca de Protocolo:{{ $search }}</h2>
                        </strong>
                    @endif
                    @if (count($protos) == 0 && $search)
                        <strong class="alert alert">Não foi possivel achar cadastros para este nome: {{ $search }}! <a
                                href="{{ route('tabelaprotocolo') }}">Voltar</a></strong>
                    @elseif(count($protos) == 0)
                        <p>Não há cadastros para este dado informado!</p>
                    @endif
                </div>
                @foreach ($protos as $protocolo)
                @endforeach
            </div>
    </div>
    <div class="card-footer col-12 modal-title text-center">

        @role('admin')
            <strong class="alert alert"> Acesso de Admin!!<a></strong>

            <!--aqui vai nome rota -->
            <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Incluir Cadastro Pessoa</a>
            <!--rota para cadastro pessoas -->
        @else
            <strong class="alert alert">Você não tem permissões para Cadastrar Usuarios!<a></strong>
        @endrole
        <a href="{{ route('pdfId') }}" class="btn btn-primary"> Relatório Geral PDF</a>
    </div>

    <div class="row">
        <table class="table table-hover table table-bordered">
            <thead>
                <tr>


                    <th>Id</th>
                    <th>Nome Pessoa</th>
                    <th>Prazo</th>
                    <th>Descrição</th>
                    <th>Data Requisição</th>
                    <th>Departamento Id</th>
                    <th>Departamento</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($protos as $protos)
                    <tr>

                        <td>{{ $protos->id }}</td>
                        <td>{{ $protos->cadastropessoass->nome }}</td>
                        <td>{{ $protos->prazo }}</td>
                        <td>{{ $protos->descricao }}</td>
                        <td class="text-primary">{{ $protos->created_at->toFormattedDateString() }}</td>
                        <td>{{ $protos->departamento_id }}</td>
                        <td>{{ $protos->departamento->departamento }}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="{{ route('editprot', ['protocolo' => $protocolo]) }}">Editar</a>
                                </li>
                                <li>
                                    <a href="{{ route('deleteprot', ['protocolo' => $protocolo]) }}">Deletar</a>
                                </li>
                        <td>
                            <a href="{{ route('unicopdf', ['protos' => $protos]) }}" class="btn btn-danger">pdf</button>
                            </a>
                        </td>
                        <td>
                            </ul><a class="btn btn-primary"
                                href="{{ route('acompanhamento', ['id' => $protocolo->id]) }}">Registrar acompanhamento</a>
                            </a>
                        </td>


                        </td>
                    </tr>
                    <div>

                    </div>
                @endforeach
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script>
            $(document).ready(function() {
                $('#protosss').DataTable({
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
    @endsection
