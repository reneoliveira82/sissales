<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSacUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sac_unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sac_tipo_unid')->unsigned();
            $table->foreign('id_sac_tipo_unid')->references('id')->on('sac_tipo_unidades')->onUpdate('cascade');
            $table->string('unid_descricao', 60);
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
        Schema::dropIfExists('sac_unidades');
    }
}
