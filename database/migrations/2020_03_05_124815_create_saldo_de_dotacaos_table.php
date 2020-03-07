<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaldoDeDotacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_de_dotacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exercicio');
            $table->string('unidade_orcamentaria');
            $table->string('unidade_executora');
            $table->string('classificacao_funcional_programatica');
            $table->string('natureza_de_despesa');
            $table->string('vinculo');
            $table->integer('codigo_dotacao');
            $table->decimal('dotacao');
            $table->decimal('empenhado');
            $table->decimal('saldo');
            $table->decimal('reserva');
            $table->string('user_update');
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
        Schema::drop('saldo_de_dotacaos');
    }
}
