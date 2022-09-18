@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container-fluid no-padding table-responsive-sm">
        <table class="table table-striped nowrap" style="width:100%" id="protosss">
            <div class="conteudo-modal-title text-center">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand"></a>
                    <div>
                        <!--input para pesquisar na pagina -->
                        <div class="conteudo-modal-title text-center">

                            <h2> Lista permissões</h2>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
                    </div>
            </div>
    </div>

    <div class="row">
        <table class="table table-hover table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tr>
                <br>
                <br>
                <td>{{ $user->id }}
                <td> {{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td> {{ $user->created_at }}</td>

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

                </td>
            </tr>
        </table>
    </div>

@endsection
