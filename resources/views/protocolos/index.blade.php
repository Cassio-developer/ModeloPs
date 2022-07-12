@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <div class="conteudo-modal-title text-center">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Navbar</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0-dark bg-primary" type="submit">Pesquisar</button>
            </form>
        </nav>
        <h1>Listagem de Cadastro Protocolos</h1>
        <h3>Para
            que seja registrado o protocolo, portanto, primeiro a pessoa demandante
            terá de ser cadastrada no cadastro de pessoas!.</h3>
        <div class="container-fluid no-padding table-responsive-sm">
            <table class="table table-striped nowrap" style="width:100%" id="exemplo">
                <thead align="center">

        </div>

        <div class="card-footer col-12 modal-title text-center">
            <!--aqui vai nome rota -->
            <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Incluir Cadastro Pessoa</a>
            <!--rota para cadastro pessoas -->
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Numero</th>
                    <th>Campo Protocolo</th>
                    <th>Descrição</th>
                    <th>Data Requisição</th>
                    <th>Demandante</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipamentoss as $equipamento1)
                    <tr>
                        <td>{{ $equipamento1->id }}</td>
                        <td>{{ $equipamento1->nome }}</td>
                        <td>{{ $equipamento1->campoprotocolo }}</td>
                        <td>{{ $equipamento1->descricao }}</td>
                        <td>{{ $equipamento1->DataRequisicao }}</td>
                        <td>{{ $equipamento1->demandante }}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="{{ route('equipamento.edit', ['equipamento1' => $equipamento1]) }}">Editar</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('equipamento.delete', ['equipamento1' => $equipamento1]) }}">Deletar</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <script>
        //teste de input pra mostrar os nomes cadastrados no banco e procurar
        $(document).ready(function() {
            $('#exemplo').DataTable({
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
                    "sSearch": "Pesquisar",
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
