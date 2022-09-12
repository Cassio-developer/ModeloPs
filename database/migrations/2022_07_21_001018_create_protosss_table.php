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
            $table->bigIncrements('id');
            $table->string('descricao', 70);
            $table->date('DataRequisicao', 0);
            $table->string('prazo', 30);   
            $table->unsignedBigInteger('cadastropessoass_id');
            $table->foreign('cadastropessoass_id')->references('id')->on('cadastropessoass')->onDelete('cascade');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->timestamps();
            $table->index(['descricao','DataRequisicao','prazo','cadastropessoass_id'],'index');
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
