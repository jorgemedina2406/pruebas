<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_venta', function (Blueprint $table) {
            $table->integer('producto_id')->unsigned();
            $table->integer('venta_id')->unsigned();
            $table->integer('quantity')->unsigned();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('venta_id')->references('id')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_venta');
    }
}
