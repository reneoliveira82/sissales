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
    }
}
