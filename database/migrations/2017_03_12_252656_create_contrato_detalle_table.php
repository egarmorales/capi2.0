<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_detalle', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('contrato_id')->unsigned();
            $table->foreign('contrato_id')->references('id')->on('contratos');

            $table->integer('partida_id')->unsigned();
            $table->foreign('partida_id')->references('id')->on('presupuesto_partidas');

            $table->integer('num_linea');
            $table->text('descripcion')->nullable();
            $table->decimal('cantidad', 20,10)->default(1);
            $table->decimal('pu', 20,10)->default(1);
            $table->decimal('subtotal', 20,10)->default(0);
            $table->decimal('iva', 20,10)->default(0);
            $table->decimal('total', 20,10)->default(0);
            $table->decimal('restante_subtotal', 20,10)->default(0);
            $table->decimal('amortizacion', 20,10)->default(0);
            $table->decimal('retencion', 20,10)->default(0);
            $table->decimal('retencion_orig', 20,10)->default(0);
            $table->decimal('restante_amortizacion', 20,10)->default(0);
            $table->decimal('restante_retencion', 20,10)->default(0);
            $table->decimal('subtotal_orig', 20,10)->default(0);




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
        Schema::dropIfExists('contrato_detalle');
    }
}
