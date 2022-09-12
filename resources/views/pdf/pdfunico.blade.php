<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>PDF RELATORIOS</title>
    
</head>
<style>
    .table-condensed {
        font-size: 13px;
    }

    div {
        margin-top: 10px;
    }
</style>

    <body>
    <header>
        
    </header>
    <div class="align-itens-center" style="width: 100%">
            
                <img width="100" src="{{public_path('imagens/logo.png')}}">
                <h4 class="text-center" style="margin-top: 30px">Prefeitura Municipal de São Leopoldo<br /></h4>
                <h4 class="text-center">Secretária Municipal de Desenvolvimento Social</h4>
                <h4 class="text-center">Relatório de protocolo</h4>
    </div>
    <div  class="align-itens-center">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead style="text-align: center">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Data</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    <tr>
                        <td>{{$protocolo->cadastropessoass->nome}}</td>
                        <td>{{$protocolo->DataRequisicao->format('d-m-Y')}}</td>
                        <td>{{$protocolo->descricao}}</td>
                        <td>{{$protocolo->arquivo}}</td>
                    </tr>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>