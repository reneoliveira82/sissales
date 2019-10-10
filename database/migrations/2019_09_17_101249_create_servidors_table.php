<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servidors', function (Blueprint $table) {
            $table->increments('id');                  
            $table->integer('id_nacion')->unsigned();
            $table->foreign('id_nacion')->references('id')->on('nacionalidades')->onUpdate('cascade');
            $table->integer('id_est_civil')->unsigned();
            $table->foreign('id_est_civil')->references('id')->on('estado_civils')->onUpdate('cascade');
            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id')->on('municipios')->onUpdate('cascade');
            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status')->onUpdate('cascade');
            $table->string('orgao')->nullable();
            $table->string('pais_orig', 60)->nullable();  
            $table->string('matricula', 15);
            $table->string('nome', 100);
            $table->date('dt_nasc');
            $table->string('uf_nat', 2)->nullable();
            $table->string('mun_origem', 60)->nullable();
            $table->string('sexo', 1);
            $table->string('nome_pai', 100)->nullable();
            $table->string('nome_mae', 100)->nullable();
            $table->string('rg', 15);
            $table->string('cpf', 15);
            $table->string('org_exp_rg', 5);
            $table->string('uf', 2);
            $table->date('dt_exp_rg');
            $table->string('pis_pasep', 13)->nullable();
            $table->string('tit_eleitor', 12)->nullable();
            $table->string('zona', 3)->nullable();
            $table->string('secao', 4)->nullable();
            $table->string('uf_exp_tit', 2)->nullable();
            $table->date('dt_exp_tit')->nullable();
            $table->string('sei')->nullable();
            $table->string('num_cnh', 20)->nullable();
            $table->date('dt_val_cnh')->nullable();
            $table->longText('cert_obito')->nullable();

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
        Schema::dropIfExists('servidors');
    }
}
