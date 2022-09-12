@extends('layouts.master')
@section('title','Prefeitura')
@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <form action="{{ route('salvandoacomp',['id'=>$protocolo->id]) }}" method="post">
    @csrf
    
    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Acompanhamento:</h5>
        </div>
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
                <label for="descricao" class="control-label">Descrição: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"
                        value="{{isset($acompanhamento->descricao) ? $cras->descricao : old('descricao') }}" >
                </div>
            </div>
            


            {{--- Formulario data de nascimento Cras ---}}

            <div class="form-group col-md-6">
                <label for="data" class="control-label">Data: *</label>
                <div class="input-group">
                    <input type="date" class="form-control date" id="data" name="data"
                        value="{{isset($acompanhamento->data) ? $cras->data : old('data') }}">
                </div>
            </div>


                <select required="required" style="background-color: #white" class="form-control"  name="user_id" id="user_id">
                    <option  value="">Usuário do acompanhamento</option>    
                    @foreach ($user as $user)
                    <option  value="{{ $user->id }}"> 
                    {{ $user->name }}
                    </option>
                    @endforeach
                </select> 
                
             
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a class="btn btn-secondary" href="{{ url('tabelaprotocolo') }}">Cancelar</a>
                </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    </div>
</form>
@endsection