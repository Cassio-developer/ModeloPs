<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanhamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data')->nullable();
            $table->string('descricao')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('protocolo_id');
            $table->foreign('protocolo_id')->references('id')->on('protosss')->onDelete('cascade');
            $table->timestamps();
            $table->index(['data','descricao','user_id','protocolo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acompanhamentos');
    }
}
