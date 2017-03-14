<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('contrato_id')->unsigned();
            $table->foreign('contrato_id')->references('id')->on('contratos');

            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')->references('id')->on('proyectos');

            $table->integer('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores');

            $table->integer('moneda_id')->unsigned();
            $table->foreign('moneda_id')->references('id')->on('monedas');

            $table->integer('estatus_id')->unsigned();
            $table->foreign('estatus_id')->references('id')->on('factura_estatus');

            $table->integer('tipo_factura_id')->unsigned();
            $table->foreign('tipo_factura_id')->references('id')->on('factura_tipos');

            $table->integer('tipo_pago_id')->unsigned();
            $table->foreign('tipo_pago_id')->references('id')->on('lista_pagos');

            $table->integer('consecutivo_id');

            $table->decimal('tipo_cambio', 20,10)->default(1);
            $table->string('num_factura')->nullable();
            $table->date('fecha_factura')->nullable();
            $table->text('comentarios_cancelacion')->nullable();
            $table->text('comentarios')->nullable();

            $table->date('fecha_pago')->nullable();
            $table->string('num_registro_pago')->nullable();

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
        Schema::dropIfExists('facturas');
    }
}
