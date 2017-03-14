<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('clave')->nullable();
            $table->integer('folio');
            $table->integer('tipo_documento_id')->unsigned();
            $table->foreign('tipo_documento_id')->references('id')->on('lista_tipos_documentoContrato');

            $table->integer('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores');

            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')->references('id')->on('proyectos');

            $table->integer('presupuesto_id')->unsigned();
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos');

            $table->integer('moneda_id')->unsigned();
            $table->foreign('moneda_id')->references('id')->on('monedas');

            $table->integer('impuesto_id')->unsigned();
            $table->foreign('impuesto_id')->references('id')->on('impuestos');

            $table->integer('estatus_id')->unsigned();
            $table->foreign('estatus_id')->references('id')->on('contrato_estatus');

            $table->integer('responsable_id')->unsigned();
            $table->foreign('responsable_id')->references('id')->on('users');

            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin_programada')->nullable();
            $table->date('fecha_fin_real')->nullable();

            $table->decimal('porcentaje_anticipo', 20,10)->default(0);
            $table->decimal('porcentaje_garantia', 20,10)->default(0);
            $table->decimal('anticipo', 20,10)->default(0);
            $table->decimal('garantia', 20,10)->default(0);
            $table->decimal('garantia_orig', 20,10)->default(0);

            $table->text('comentarios')->nullable();
            $table->text('comentarios_condiciones')->nullable();
            $table->decimal('tipo_cambio', 20,10)->default(1);
            $table->text('fianzas');

            $table->integer('cuenta_pagadora_id')->unsigned()->nullable();
            $table->foreign('cuenta_pagadora_id')->references('id')->on('cuentas_pagadora');


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
        Schema::dropIfExists('contratos');
    }
}
