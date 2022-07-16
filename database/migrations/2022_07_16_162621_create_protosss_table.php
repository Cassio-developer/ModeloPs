<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtosssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protosss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('campoprotocolo', 150);
            $table->string('descricao', 50);
            $table->dateTime('DataRequisicao', 0);
            $table->string('demandante', 15);  
           
            $table->unsignedBigInteger('cadastropessoass_id');
            //foreign referenciando  tabela cadastropessoass_id
            $table->foreign('cadastropessoass_id')->references('id')->on('cadastropessoass')->onDelete('cascade');
            $table->timestamps();
            $table->index(['nome','campoprotocolo','descricao','DataRequisicao','demandante'],'index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protosss');
    }
}
