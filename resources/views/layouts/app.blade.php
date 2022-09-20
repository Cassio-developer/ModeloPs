<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles bootstrap cassio-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Styles Meta tag responsiva cassio-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('assets/img/logo_prefeitura.ico') }}" type="image/x-icon" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Datatables  testecassio-->

    <!-- Datatables  teste cassio-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">



</head>

<body>
    
    @if (Session::has('message'))
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
                    <img src="{{ asset('assets/img/logo_prefeitura.png') }}" alt="Logo Prefeitura" class="img-navbar">
                </a>
            </div>

            <div class="span">
                <span> PROJETO EXEMPLO CASSIO</span>
            </div>

        </nav>
    </header>
    <main class="main">
        <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('assets/img/São-Leopoldo-Intendência-Municipal.jpg') }}'); background-size: cover; background-position: top center;align-items: center; position: relative; height: 100vh ;width: 100vw; margin: 0;" data-color="rose">
        @yield('content')
        </div>
    </main>

    <footer>
        <div>
            <ul>
                <li>{{ date('Y') }} &copy; 2022</li>
            </ul>
        </div>
        <!--  bootstrap  cassio teste-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>


        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function($) {
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
