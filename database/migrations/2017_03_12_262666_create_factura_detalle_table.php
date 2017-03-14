<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_detalle', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('factura_id')->unsigned();
            $table->foreign('factura_id')->references('id')->on('facturas');

            $table->integer('detalleContrato_id')->unsigned();
            $table->foreign('detalleContrato_id')->references('id')->on('contrato_detalle');

            $table->integer('partida_id')->unsigned();
            $table->foreign('partida_id')->references('id')->on('presupuesto_partidas');

            $table->integer('impuesto_id')->unsigned();
            $table->foreign('impuesto_id')->references('id')->on('impuestos');

            $table->decimal('subtotal', 20,10)->default(0);
            $table->decimal('iva', 20,10)->default(0);
            $table->decimal('total', 20,10)->default(0);
            $table->decimal('amortizado', 20,10)->default(0);
            $table->decimal('retenido', 20,10)->default(0);
            $table->decimal('multas', 20,10)->default(0);

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('updated_by')->unsigned();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_detalle');
    }
}
