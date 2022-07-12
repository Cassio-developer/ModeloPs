<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 50);
            $table->string('endereco', 150);
            $table->string('cidade', 50);
            $table->dateTimeTz('datanascimento', 0);
            $table->string('telefone', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('cpf', 50);
            $table->string('bairro', 15);
            $table->index(['nome', 'endereco', 'cidade', 'bairro']);
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
        Schema::dropIfExists('equipamentos');
    }
}
