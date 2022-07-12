@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="conteudo">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1>Cadastro de Pessoa</h1>
                @include('equipamentos.form2')

            </div>
            <div class="col-md-4">
                <input type="submit" name="save_eqp" value="Cadastrar">
                <input type="submit" name="cancel" value="Cancelar">
            </div>

            </form>
        </div>
    </div>


@endsection
