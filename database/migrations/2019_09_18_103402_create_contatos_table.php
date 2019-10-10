<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_servidor')->unsigned();
            $table->foreign('id_servidor')->references('id')->on('servidors')->onUpdate('cascade');
            $table->string('ddd1',4)->nullable();
            $table->string('tel_resid_1')->nullable();
            $table->string('ddd2',4)->nullable();
            $table->string('tel_resid_2')->nullable();
            $table->string('ddd_cel',4)->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('contatos');
    }
}
