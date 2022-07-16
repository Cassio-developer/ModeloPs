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
            $table->integer('numero');
            $table->string('campoprotocolo', 150);
            $table->string('descricao', 50);
            $table->dateTime('DataRequisicao', 0);
            $table->string('pessoa', 15); //adiconado pessoa com relação a forkey
            $table->index(['pessoa','numero','campoprotocolo','descricao','DataRequisicao'],'indexequipamentoss');
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
        Schema::dropIfExists('equipamentoss');
    }
}
