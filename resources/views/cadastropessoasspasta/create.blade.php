@extends('layouts.master')
@section('title','EXEMPLO')
@section('content')
<div class="conteudo">
 <div class="card-footer col-12 modal-title-center">
      
        <h1>Cadastro de Pessoa</h1>
        
        @include('cadastropessoasspasta._form3')
        
    </div>
         <div class="card-footer-text-center">
            <button type="submit" class="btn btn-primary" name="save_eqp">Cadastrar</button>
             <button type="submit" class="btn btn-primary" name="cancel">Cancelar</button>
        </div>
    </form>
</div>
</div>
    <script> 
            document.getElementById("Cadastrar").disabled = true;
            document.getElementById("input").addEventListener("input", function(event){
                 var conteudo = document.getElementById("input").value;
                 if (conteudo !== null && conteudo !== '') {
                    document.getElementById("Cadastrar").disabled = false;
                     } else {
                         document.getElementById("Cadastrar").disabled = true;
    }
});
            
            
            </script>

@endsection