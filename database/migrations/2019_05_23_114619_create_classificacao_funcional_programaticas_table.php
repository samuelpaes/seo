<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassificacaoFuncionalProgramaticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classificacao_funcional_programaticas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->string('codigo');
			$table->string('especificacao');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classificacao_funcional_programaticas');
    }
}
