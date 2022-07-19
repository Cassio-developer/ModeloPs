@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="justify-content-center title text-center">Administração de Usuarios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-footer col-12 modal-title text-center">
                            <h3>Lista de Usuarios</h3>
                            <a href="{{ url('usuarios/new') }}">Novo Usuario</a>
                        </div>
                    </div>
                </div>
                <div class="row">

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

                                                <a class="=btn btn-info" href="usuarios/{{ $u->id }}/edit">Editar</a>
                                            </li>
                                            <li>
                                                <a class="=btn btn-danger"href="">Deletar</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                </div>
                <div>

                </div>
                @endforeach
                </tbody>
                </table>

            @endsection
