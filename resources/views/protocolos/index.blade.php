@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo-modal-title text-center">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Navbar</a>
            <div>
                <!--input para pesquisar na pagina -->
                <div class="col-sm-12">
                    <form action="{{ route('equipamento.index') }}" method="GET">
                        {{ csrf_field() }}
                        <input type="search" class="form-control input-sm" name="search" value="{{ $search }}">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0-dark bg-primary"
                            type="search">Pesquisar</button>
                    </form>
                </div>
        </nav>
        <div class="conteudo-modal-title text-center">
            <h3>Para que seja registrado o protocolo, portanto, primeiro a pessoa demandante terá de ser cadastrada no
                cadastro de pessoas!.</h3>
            <h1>Listagem de Cadastro Protocolos</h1>
            <!--if else para search -->
            @if ($search)
                <h2>Buscando por:{{ $search }}</h2>
            @else
                <h2>Proximos Cadastros:{{ $search }}</h2>
            @endif
            @if (count($equipamentoss) == 0 && $search)
                    <p>Não foi possivel achar cadastros para este nome: {{ $search }}! <a
                            href="{{ route('equipamento.index') }}">Voltar</a></p>
                @elseif(count($equipamentoss) == 0)
                    <p>Não há cadastros para este dado informado!</p>
                @endif
        </div>
        @foreach ($equipamentoss as $equipamento1)
          
                @endforeach
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
                    <!--verificar amanha -->
                    <th>Demandante Id</th>
                    <th>Id</th>
                    <th>Numero Protocolo</th>
                    <th>Campo Protocolo</th>
                    <th>Descrição</th>
                    <th>Data Requisição</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($equipamentoss as $equipamento1)
                    <tr>       <!--verificar amanha -->
                        <td>{{ $equipamento1->pessoa}}</td>
                        <td>{{ $equipamento1->id }}</td>
                        <td>{{ $equipamento1->numero }}</td>
                        <td>{{ $equipamento1->campoprotocolo }}</td>
                        <td>{{ $equipamento1->descricao }}</td>
                        <td>{{ $equipamento1->DataRequisicao }}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a
                                        href="{{ route('equipamento.edit', ['equipamento1' => $equipamento1]) }}">Editar</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('equipamento.delete', ['equipamento1' => $equipamento1]) }}">Deletar</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <div>
    </div>
    @endforeach
    </tbody>
    </table>

@endsection
