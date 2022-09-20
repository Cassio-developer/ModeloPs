@extends('layouts.master')
@section('title', 'Prefeitura')
@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ url('/') }}"> voltar</a>
    </div>
    <form action="{{ route('atribuirsalvando', ['id' => $departamento->id]) }}" method="POST" class="form-horizontal"
        id="formProduto" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="container-fluid no-padding table-responsive-sm">
            <table class="table table-striped nowrap" style="width:100%" id="prefeitura">
                <thead style="align: center">
                    <tr>

                        <th>Nome do Departamento</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $departamento->departamento }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <select required="required" style="background-color: #white" class="form-control" name="user_id" id="user_id">
                <option value="">Usuário do acompanhamento</option>
                @foreach ($user as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Atribuir usuário</button>

            </div>
        </div>
    </form>
    </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    
@endsection
