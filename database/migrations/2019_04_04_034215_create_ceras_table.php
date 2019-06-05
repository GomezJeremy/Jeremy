<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Descripcion');
            $table->integer('Recepcion_id')->unsigned();
            $table->foreign('Recepcion_id')->references('id')->on('recepcion_materia_primas');
            $table->float('PesoBruto');
            $table->float('PesoNeto');
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
        Schema::dropIfExists('ceras');
    }
}
