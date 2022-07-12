<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentoss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('campoprotocolo', 30);
            $table->string('descricao', 50);
            $table->dateTime('DataRequisicao', 0);
            $table->string('demandante', 15);  
            $table->timestamps();
             $table->index(['nome','campoprotocolo','descricao','demandante','DataRequisicao']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentoss');
    }
}
