<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTabletestes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos_tabletestes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 50);
            $table->string('modelo', 15)->nullable();
            $table->string('fabricante', 30)->nullable();
            $table->timestamps();
            $table->index(['tipo', 'modelo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos_tabletestes');
    }
}
