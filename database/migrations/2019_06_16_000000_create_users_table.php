<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default(Hash::make('123456'));
            $table->string('cpf', 15);
            $table->string('matricula', 15);
            $table->string('funcao', 60);
            $table->string('telefone', 15);
            // $table->integer('id_orgao')->unsigned()->nullable();
            // $table->foreign('id_orgao')->references('id')->on('orgaos')->onUpdate('cascade');
            // $table->integer('id_vinculo_empregaticio')->unsigned()->nullable();
            // $table->foreign('id_vinculo_empregaticio')->references('id')->on('vinculo_empregaticios')->onUpdate('cascade');
            $table->enum('solicita_conta', ['S','N','A'])->nullable();
            $table->enum('ativo', ['S','N'])->default('N');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
