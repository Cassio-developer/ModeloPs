<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protos_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 50);
            $table->string('campoprotocolo', 150);
            $table->string('descricao', 50);
            $table->dateTimeTz('DataRequisicao', 0);
            $table->string('demandante', 15);
            $table->index(['nome', 'campoprotocolo', 'descricao', 'DataRequisicao', 'demandante'],'campos');
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
        Schema::dropIfExists('protos');
    }
}
