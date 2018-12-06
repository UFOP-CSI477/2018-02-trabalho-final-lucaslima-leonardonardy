<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pib', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('idPais');
            $table->double('consumo');
            $table->double('investimento');
            $table->double('gastosGoverno');
            $table->double('exportacoes');
            $table->double('importacoes');
            $table->integer('ano');
            $table->timestamps();

            $table->foreign('idPais')
                ->references('id')
                ->on('pais')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pib');
    }
}
