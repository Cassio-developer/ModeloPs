@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo">
        <div class="container">
            <div class="row">
                <h3 class="col-12 modal-title text-center">Novo Cadastro</h3>

                @include('protocolos._formproto')
            </div>
        </div>
        <div class="col-12 modal-title text-center">

            <input type="submit" class="btn btn-primary" name="save_eqp">

            <input type="submit" class="btn btn-primary" name="cancel" value="Cancelar">
        </div>

    </div>
    </div>
@endsection
