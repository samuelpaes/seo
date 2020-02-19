<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeExecutorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_executoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->string('unidade');
			$table->string('codigo');
			$table->string('unidade_orcamentaria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidade_executoras');
    }
}
