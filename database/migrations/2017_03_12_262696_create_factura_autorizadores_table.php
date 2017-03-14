<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaAutorizadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_autorizadores', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('factura_id')->unsigned();
            $table->foreign('factura_id')->references('id')->on('facturas');

            $table->integer('autorizador_id')->unsigned();
            $table->foreign('autorizador_id')->references('id')->on('users');

            $table->integer('estatus_id')->unsigned();
            $table->foreign('estatus_id')->references('id')->on('autorizador_estatus');

            $table->integer('orden')->default(1);
            $table->boolean('autorizacion_habilitada')->default(false);
            $table->text('comentariosRechazo')->nullable();

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
        Schema::dropIfExists('factura_autorizadores');
    }
}
