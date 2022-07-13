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
            <h3>Para que seja registrado o protocolo, portanto, primeiro a pessoa demandante terá de ser cadastrada no
                cadastro de pessoas!.</h3>
              
    </div>
    <div class="card-footer col-12 modal-title text-center">
        <!--aqui vai nome rota -->
        <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Incluir Cadastro Pessoa</a>
        <!--rota para cadastro pessoas -->
    </div>
    </div>
    @endforeach
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
    </div>
    </div>

@endsection
