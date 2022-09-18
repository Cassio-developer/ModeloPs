@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <div class="container-fluid no-padding table-responsive-sm">
        <table class="table table-striped nowrap" style="width:100%" id="users">
            <div class="conteudo-modal-title text-center">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand"></a>
                    <div>
                        <h2>Administração</h2>
                        <a class="badge badge-success">
                            Seja bem vindo, {{ Auth::user()->name }}
                        </a>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create Novo usuario</a>
                    </div>
            </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <div class="row">
        <table class="table table-hover table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data</th>
                    <th>Privelégio</th>
                </tr>
            </thead>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-primary">{{ $user->created_at->toFormattedDateString() }}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display: inline-block;" onsubmit="return confirm('Tem certeza??')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                        <i class="material-icons">Deletar</i>
                                    </button>
                                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script>
            $(document).ready(function() {
                $('#users').DataTable({
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
