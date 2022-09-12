@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
        
                    <div class="justify-content-center title text-center">Administração de Usuarios</div>
                </div>
                <div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-footer col-12 modal-title text-center">
                            <h3>Lista de Usuarios</h3>

                        </div>
                  
                </div>


                <table id="grid-basic" class="w3-table-all w3-card-4  table-hover table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome </th>
                            <th scope="col">E-mail</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarios as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <!--<a class="=btn btn-info" href="  route('edit', ['$u' => $u]) }}">Editar</a> -->
                                        </li>
                                        <li>
                                            <form action="usuarios/delete/{{ $u->id }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button class="=btn btn-danger">Deletar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
          
           
            <div>
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
