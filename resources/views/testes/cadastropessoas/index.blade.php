@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Listagem de Equipamentos</h3>
        </div>
        <div class="col-md-8">
           <a href="{{route('teste.create')}}" class="btn btn-primary">Incluir Equipamento</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($equipamentos as $oi)
                <tr>
                    <td>{{ $oi->id }}</td>
                    <td>{{ $oi->tipo }}</td>
                    <td>{{ $oi->modelo }}</td>
                    <td>{{ $oi->fabricante }}</td>
                    <td>
                        <ul class="list-inline">
                            <li>
                            <a href="">Editar</a>
                            </li>
                            <li>
                            <a href="">Deletar</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection