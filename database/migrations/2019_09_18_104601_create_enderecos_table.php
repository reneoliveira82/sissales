<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_servidor')->unsigned();
            $table->foreign('id_servidor')->references('id')->on('servidors')->onUpdate('cascade');
            $table->integer('id_tipo_lograd')->unsigned();
            $table->foreign('id_tipo_lograd')->references('id')->on('tipo_logradouros')->onUpdate('cascade');
            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id')->on('municipios')->onUpdate('cascade');
            $table->integer('id_pais')->usigned();
            $table->foreign('id_pais')->references('id')->on('pais_origems')->onUpdate('cascade');
            $table->string('logradouro');
            $table->string('numero',10)->nullable();
            $table->string('compl_logradouro')->nullable();
            $table->string('bairro');
            $table->string('uf_endereco',2);
            $table->string('cep',8)->nullable();
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
        Schema::dropIfExists('enderecos');
    }
}
