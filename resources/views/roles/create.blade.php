@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <div class="container-fluid no-padding table-responsive-sm">
    <table class="table table-striped nowrap" style="width:100%" id="users">
            <div>
            <h2>Criar Novo Permissão</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Voltar</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Ops!</strong> Problemas no input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('roles.store') }}" method="POST" class="form-horizontal" id="formProduto" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="name" class="control-label">Nome:</label>
        
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
            autofocus placeholder="Nome"  value="{{isset($dep->name) ? $dep->name : old('name') }}" >
        </div>
    </div>
    <label for="name" class="control-label">Permissões:</label>

    <div class="row">
        <table class="table table-hover table table-bordered">
        <tbody>
          @foreach ($permissions as $id => $permission)
          <tr>
            <td>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="permissions[]"
                    value="{{ $id }}">
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
            </td>
            <td>
              {{ $permission }}
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
    <div class="justify-content-center title text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  


@endsection