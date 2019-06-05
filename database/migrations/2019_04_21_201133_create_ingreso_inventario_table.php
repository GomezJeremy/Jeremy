<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoInvetarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_inventario', function (Blueprint $table) {
           $table->increments('idingreso_inventario');
            $table->string('idproveedor',12);
            $table->foreign('idproveedor')->references('id')->on('afiliados');
            $table->integer('idusuario')->unsigned();
            $table->foreign('idusuario')->references('id')->on('users');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('tipo_pago');
            $table->double('total_venta');
            $table->dateTime('fecha_hora');
            $table->string('estado');
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
        Schema::dropIfExists('ingreso_inventario');
    }
}
