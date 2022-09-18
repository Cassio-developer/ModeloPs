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
                            <h2> Exibir Role</h2>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> voltar</a>
                    </div>
            </div>
    </div>
    <div class="card-header card-header-primary">
        <h4 class="card-title">Roles</h4>
        <p class="card-category">Lista detalhada roles : {{ $role->name }}</p>

    <div class="row">
        <table class="table table-hover table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Permissião:</th>
                    <th>Criado:</th>
                        
                        <img class="avatar" src="{{url('assets/img/default-avatar.png')}}" alt="">
                        <h5 class="title mt-3">Rol: {{ $role->name }}</h5>
                      </a>
                </tr>
            </thead>
            <tr>

                <td> {{ $role->name }}</td>
                <td> {{ $role->guard_name }}</td>
                <td> {{ $role->created_at }}</td>
               
                
                <td>
                    @if (!empty($rolePermissions))
                        @foreach ($rolePermissions as $v)
                            <label class="badge badge-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                    @forelse ($role->permissions as $permission)
                <span class="badge badge-success">{{ $permission->name }}</span>
            @empty
                <span class="badge badge-danger bg-danger">Sem permissões</span>
            @endforelse
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
