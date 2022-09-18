@extends('layouts.master')
@section('title', 'EXEMPLO')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3>Editar Protocolos</h3>
                    <?php $form_mode = 'edit'; ?>
                    @include('cadastropessoasspasta._form3')
                    </form>
                </div>
            </div>

        @endsection
