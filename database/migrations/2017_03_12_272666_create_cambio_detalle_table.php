<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCambioDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambio_detalle', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cambio_id')->unsigned();
            $table->foreign('cambio_id')->references('id')->on('cambios');

            $table->integer('partida_id')->unsigned();
            $table->foreign('partida_id')->references('id')->on('presupuesto_partidas');

            $table->integer('detalleContrato_id')->unsigned();
            $table->foreign('detalleContrato_id')->references('id')->on('contrato_detalle');

            $table->integer('motivo_id')->nullable()->comment('Va ligado al tipo de orden de cambio a Ppto -> lista_motivosOCP, Costo -> lista_motivosOCC, Movimiento a ppto -> NULL');
            $table->decimal('subtotal', 20,10);
            $table->text('justificacion')->nullable();

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
        Schema::dropIfExists('cambio_detalle');
    }
}
