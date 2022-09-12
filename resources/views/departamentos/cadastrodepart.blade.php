@extends('layouts.master')
@section('title','Prefeitura')
@section('content')

<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      </head>

<form action="{{ route('storedepart')}}" method="POST" class="form-horizontal" id="formProduto" enctype="multipart/form-data">
    @csrf               
    @method('POST')
    
    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Cadastrar departamento</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            @if ($errors->any())
            <div class='alert alert-danger'>
             @foreach ( $errors->all() as $error )
              <p>{{ $error }}</p>
             @endforeach
            </div>
           @endif
            
            {{--- Formulario Nome ---}}

            <div class="form-group">
                <label for="departamento" class="control-label">Nome departamento: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento de TI"
                        value="{{isset($dep->departamento) ? $dep->departamento : old('departamento') }}" >
                </div>
            </div>

              
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>


</form>

</div>
</div>
</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</html>

@endsection