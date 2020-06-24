<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioAlteracaoOrcamentariasTable extends Migration
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
            $table->string('status');
            $table->string('usuario_emissor');
            $table->string('usuario_analise')->nullable();
            $table->string('justificativa_analise')->nullable();
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
        Schema::dropIfExists('formulario_alteracao_orcamentarias');
    }
}
