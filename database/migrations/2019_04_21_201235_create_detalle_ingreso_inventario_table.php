<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoInvetarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso_inventario', function (Blueprint $table) {
      
        $table->increments('iddetalle_ingreso_inventario');
        $table->integer('idingreso_inventario')->unsigned();
        $table->foreign('idingreso_inventario')->references('idingreso_inventario')->on('ingreso_inventario');
        $table->integer('stock_id')->unsigned();
        $table->foreign('stock_id')->references('id')->on('stocks');
        $table->double('Precio');
        $table->integer('cantidad');
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
        Schema::dropIfExists('detalle_ingreso_inventario');
    }
}
