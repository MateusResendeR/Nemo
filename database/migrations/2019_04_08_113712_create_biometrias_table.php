<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiometriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biometrias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->decimal('peso_total');
            $table->decimal('peso_medio');
            $table->date('data');
            $table->time('hora');
            $table->integer('tanque_id');
            $table->integer('quantidade');
            
            $table->foreign('tanque_id')->references('id')->on('tanques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biometrias');
    }
}