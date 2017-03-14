<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('proyecto');

            $table->integer('estatus_id')->unsigned();
            $table->foreign('estatus_id')->references('id')->on('proyecto_estatus');

            $table->integer('programa_id')->unsigned()->nullable();
            $table->foreign('programa_id')->references('id')->on('programas');

            $table->integer('tipo_proyecto_id')->unsigned()->nullable();
            $table->foreign('tipo_proyecto_id')->references('id')->on('lista_tiposProyecto');

            $table->integer('estado_id')->unsigned()->nullable();
            $table->foreign('estado_id')->references('id')->on('lista_estados');

            $table->integer('pais_id')->unsigned()->nullable();
            $table->foreign('pais_id')->references('id')->on('lista_paises');

            $table->integer('cliente_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')->on('proyecto_clientes');

            $table->integer('director_id')->unsigned()->nullable();
            $table->foreign('director_id')->references('id')->on('users');

            $table->integer('gerente_id')->unsigned()->nullable();
            $table->foreign('gerente_id')->references('id')->on('users');

            $table->integer('responsable_id')->unsigned()->nullable();
            $table->foreign('responsable_id')->references('id')->on('users');

            $table->string('clave');
            $table->date('fecha_inicio');
            $table->string('calle')->nullable();
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->string('municipio')->nullable();
            $table->string('telefono')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('comentarios')->nullable();
            $table->decimal('m2', 20,10)->nullable();


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
        Schema::dropIfExists('proyectos');
    }
}
