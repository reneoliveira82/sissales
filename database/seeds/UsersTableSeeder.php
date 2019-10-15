<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'suporte@saeb.ba.gov.br',
            'password' => bcrypt('suporte'),
            'cpf' => '111.111.111-11',
            'matricula' => '111111111',
            'funcao' => 'Administrador',
            'telefone' => '(00) 00000-0000',
            'ativo' => 'S',
             'updated_at' => Carbon::now(),
        ]);
=======
        DB::table('users')->insert(
            [
                [
                    'name' => 'Administrador',
                    'email' => 'cti@saeb.ba.gov.br',
                    'password' => bcrypt('123456'),
                    'cpf' => '111.111.111-11',
                    'matricula' => '111111111',
                    'telefone' => '(71) 99261-2552',
                    'id_sac_unidade'=> '1',
                    'ativo' => 'S',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

            ]   
    );
>>>>>>> 3ad796ac2d54eef20d796a8111f1a3abfaf0a38d
    }
}
