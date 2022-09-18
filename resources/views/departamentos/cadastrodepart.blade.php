@extends('layouts.master')
@section('title', 'Prefeitura')
@section('content')
    <div class="container-fluid no-padding table-responsive-sm">

        <div class="justify-content-center title text-center">
            <h2>Editar Role</h2>
        </div>
    </div>
    </div>
    </div>
    <!DOCTYPE html>
    <html lang="en">

    @role('admin')
        <strong class="alert alert">Acesso de Admin!!<a></strong>

        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>

        <form action="{{ route('storedepart') }}" method="POST" class="form-horizontal" id="formProduto"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card">
                <div class="card-header">
                    <h4 class="col-12 modal-title text-center">Cadastrar departamento</h5>
                </div>
                <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
                <div class="container col-11">


                    @if ($errors->any())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="departamento" class="control-label">Nome departamento: *</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="departamento" name="departamento"
                                placeholder="Departamento de TI"
                                value="{{ isset($dep->departamento) ? $dep->departamento : old('departamento') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
        </form>
        </div>
        </body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        </html>
    @else
        <strong class="alert alert">Você não tem permissões para Cadastro Departamentos!! Volte a sua area!<a></strong>

    @endrole
@endsection
