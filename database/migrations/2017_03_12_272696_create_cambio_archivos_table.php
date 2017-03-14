<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCambioArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambio_archivos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cambio_id')->unsigned();
            $table->foreign('cambio_id')->references('id')->on('cambios');

            $table->text('archivo');
            $table->string('nombre_archivo');

            $table->integer('tipo_archivo_id')->unsigned();
            $table->foreign('tipo_archivo_id')->references('id')->on('lista_tiposArchivo_factura');


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
        Schema::dropIfExists('cambio_archivos');
    }
}
