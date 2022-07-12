<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{asset('assets/img/logo_prefeitura.ico')}}" type="image/x-icon" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     <!-- Datatables  testecassio-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>
<!-- Datatables  teste cassio-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    

</head>

<body>
@if(Session::has('message'))
   <div class="alert alert-sucess alert-dismissible show" role="alert">
        <strong> {!! session()->get('message') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">×</span>
        </button>
   </div>
@endif
    <header>
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="img">
                <a href="/">
                    <img src="{{asset('assets/img/logo_prefeitura.png')}}" alt="Logo Prefeitura" class="img-navbar">
                </a>
            </div>

            <div class="span">
                <span>NOME PROJETO</span>
            </div>

        </nav>
    </header>
    <main class="main">
        @yield('content')
    </main>

    <footer>
        <div>
            <ul>
                <li>{{ date('Y') }} &copy; 2022</li>
            </ul>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function ($) {
                $('#rg').mask('00.000.000-00');
                $('#cpf').mask('000.000.000-00', {
                    reverse: true
                });
                $('.cnpj').mask('00.000.000/0000-00', {
                    reverse: true
                });
            });

        </script>
    </footer>
</body>


</html>