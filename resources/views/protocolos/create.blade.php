@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo">
        <div class="container">
            <div class="row">
                <h3 class="col-12 modal-title text-center">Novo Cadastro</h3>

                @include('protocolos._formproto')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="save_eqp">Cadastrar</button>
                    <button type="submit" class="btn btn-primary" name="cancel">Cancelar</button>
                </div>
            </div>
            </form>
        </div>
    @endsection
