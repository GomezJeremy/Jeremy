<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoCeraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso_cera', function (Blueprint $table) {
            $table->increments('iddetalle_ingreso_cera');
            $table->integer('idingreso_cera')->unsigned();
            $table->foreign('idingreso_cera')->references('idingreso_cera')->on('ingreso_cera');
            $table->integer('cera_id')->unsigned();
            $table->foreign('cera_id')->references('id')->on('ceras');
            $table->double('Precio');
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
        Schema::dropIfExists('detalle_ingreso_cera');
    }
}
