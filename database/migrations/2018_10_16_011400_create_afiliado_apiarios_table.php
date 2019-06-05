<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadoApiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliado_apiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('afiliado_id',12);
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->integer('apiario_id')->unsigned();
            $table->foreign('apiario_id')->references('id')->on('apiarios');
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
        Schema::dropIfExists('afiliado_apiarios');
    }
}
