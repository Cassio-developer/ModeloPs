@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{ Session::pull('message') }}
                    <h3>Deletar Cadastro?</h3>
                    <?php $form_mode = 'delete'; ?>
                    @include('cadastropessoasspasta._form3')
                </div>
            </div>
        </div>
        </form>
    @endsection
