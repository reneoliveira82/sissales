<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PerfilAcessoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil_acessos')->insert(
            [
                [
                    'nome' => 'Administrador',
                    'descricao' => 'Permissão para realizar todas as ações no sistema.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]
        );
    }
}
