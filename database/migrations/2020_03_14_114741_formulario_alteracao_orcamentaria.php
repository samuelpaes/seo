<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormularioAlteracaoOrcamentaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_alteracao_orcamentarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_formulario');
            $table->string('tipo_instrumento');
            $table->string('numero_instrumento');
            $table->string('tipo_formulario');
            $table->string('exercicio');
            $table->string('secretaria');
            $table->decimal('valor');
            $table->string('usuario');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('formulario_alteracao_orcamentarias');
    }
}
