<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestoArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto_archivos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('presupuesto_partida_id')->unsigned();
            $table->foreign('presupuesto_partida_id')->references('id')->on('presupuesto_partidas');

            $table->text('archivo');
            $table->string('nombre_archivo');

            $table->integer('tipo_archivo_id')->unsigned();
            $table->foreign('tipo_archivo_id')->references('id')->on('lista_tiposArchivo_presupuesto');


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
        Schema::dropIfExists('presupuesto_archivos');
    }
}
