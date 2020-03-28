<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegislacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legislacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('instrumento');
            $table->string('classificacao');
            $table->integer('numero');
            $table->integer('ano');
            $table->string('esfera');
            $table->string('observacao');
            $table->string('link');
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
        Schema::dropIfExists('legislacaos');
    }
}
