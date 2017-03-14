<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestoPartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto_partidas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('presupuesto_id')->unsigned();
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos');

            $table->string('codigo', 20);
            $table->string('partida');
            $table->string('tittle')->nullable()->comment('Idioma Altenativo, INGLES');
            $table->string('cuenta_contable', 100)->nullable();
            $table->integer('padre_id')->nullable();
            $table->boolean('ultimo_nivel')->default(true);
            $table->decimal('pu', 20,10)->default(0);
            $table->string('unidad')->nullable();
            $table->decimal('cantidad', 20,10)->nullable();
            $table->decimal('presupuesto', 20,10)->default(0);
            $table->text('comentarios')->nullable();
            $table->boolean('partida_cerrada')->default(false);


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
        Schema::dropIfExists('presupuesto_partidas');
    }
}
