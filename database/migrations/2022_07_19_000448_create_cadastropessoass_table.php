<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastropessoassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastropessoass', function (Blueprint $table) 
        {
            //bigIncrements seria para mais caracteres
                $table->bigIncrements('id');
                $table->string('nome', 50);
                $table->string('endereco', 150);
                $table->string('cidade', 50);
                $table->dateTime('datanascimento', 0);
                $table->string('bairro', 30); 
                $table->string('telefone', 20)->nullable();
                $table->string('email', 50)->nullable();
                $table->string('cpf', 50);
                $table->string('sexo', 30);    
                $table->string('complemento', 30);    
                $table->index(['nome','endereco','cidade','datanascimento','bairro','telefone','sexo','email','cpf'],'indexcadastropessoass');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadastropessoass');
    }
}
