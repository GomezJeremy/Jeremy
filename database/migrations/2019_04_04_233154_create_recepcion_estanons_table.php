<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecepcionEstanonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion_estanons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Recepcion_id')->unsigned();
            $table->foreign('Recepcion_id')->references('id')->on('recepcion_materia_primas');
            $table->integer('Estanon_id')->unsigned();
            $table->foreign('Estanon_id')->references('id')->on('estanons');
            $table->datetime('Fecha');
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
        Schema::dropIfExists('recepcion_estanons');
    }
}
