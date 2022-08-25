@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo-modal-title text-center">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Navbar</a>
            <div>
                <!--input para pesquisar na pagina -->
                <div class="col-sm-12">
                    <form action="{{ route('tabelaprotocolo') }}" method="GET">
                        {{ csrf_field() }}
                        <input type="search" class="form-control input-sm" name="search" value="{{ $search }}">
                        <button type="submit" class="btn btn-primary my-2 my-sm-0-dark"
                            type="search">Pesquisar</button>
                    </form>
                </div>
        </nav>
        <div class="card-body">
            @if (session('message'))
                <div class="msg" role="alert"> {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="conteudo-modal-title text-center">
            <h3>Para que seja registrado o protocolo, portanto, primeiro a pessoa demandante terá de ser cadastrada no
                cadastro de pessoas!.</h3>
            <h1>Listagem de Cadastro Protocolos</h1>
            <!--if else para search -->
            @if ($search)
                <h2>Buscando por:{{ $search }}</h2>
            @else
                <strong><h2>Busca de Protocolo:{{ $search }}</h2></strong>
            @endif
            @if (count($protos) == 0 && $search) 
                    <strong class="alert alert" >Não foi possivel achar cadastros para este nome: {{ $search }}! <a
                            href="{{ route('tabelaprotocolo') }}">Voltar</a></strong>
                @elseif(count($protos) == 0)
                    <p>Não há cadastros para este dado informado!</p>
                @endif
        </div>
        @foreach ($protos as $equipamento1)
          
                @endforeach
            </div>
    </div>
    <div class="card-footer col-12 modal-title text-center">
        <!--aqui vai nome rota -->
        <a href="{{ route('cadastropessoass.create') }}" class="btn btn-primary">Incluir Cadastro Pessoa</a>
        <!--rota para cadastro pessoas -->
    </div>
    
    
    <div class="row">
        <table class="table table-hover table table-bordered">
            <thead>
                <tr>
                    <!--verificar amanha -->
                    
                    <th>Id</th>
                    <th>Nome Pessoa</th>
                    <th>Prazo</th>
                    <th>Descrição</th>
                    <th>Data Requisição</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($protos as $equipamento1)
                    <tr>       <!--verificar amanha -->
                       
                        <td>{{ $equipamento1->id }}</td>
                        <td>{{ $equipamento1->cadastropessoass->nome }}</td>
                        <td>{{ $equipamento1->prazo }}</td>
                        <td>{{ $equipamento1->descricao }}</td>
                        <td>{{ $equipamento1->DataRequisicao }}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a
                                        href="{{ route('editprot', ['equipamento1' => $equipamento1]) }}">Editar</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('deleteprot', ['equipamento1' => $equipamento1]) }}">Deletar</a>
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
