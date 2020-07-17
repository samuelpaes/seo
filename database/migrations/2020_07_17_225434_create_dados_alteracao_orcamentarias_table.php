<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosAlteracaoOrcamentariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_alteracao_orcamentarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_formulario');
            $table->string('acao');
            $table->string('unidade_executora')->nullable();
            $table->string('classificacao_funcional_programatica')->nullable();
            $table->string('natureza_de_despesa')->nullable();
            $table->string('vinculo')->nullable();
            $table->string('dotacao')->nullable();
            $table->decimal('valor');
            $table->string('justificativa_recurso');
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
        Schema::dropIfExists('dados_alteracao_orcamentarias');
    }
}
