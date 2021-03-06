<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNitratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nitratos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor')->unsigned();
            $table->date('data');
            $table->time('hora');
            $table->timestamps();
            $table->integer('qualidade_agua_id');

            $table->foreign('qualidade_agua_id')->references('id')->on('qualidade_aguas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nitratos');
    }
}
