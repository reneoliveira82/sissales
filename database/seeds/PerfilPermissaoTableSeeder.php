<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PerfilPermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil_permissaos')->insert(
            [
                /*[
                    'permissao_id' => '1',
                    'perfil_acesso_id' => '1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'permissao_id' => '2',
                    'perfil_acesso_id' => '1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'permissao_id' => '3',
                    'perfil_acesso_id' => '1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'permissao_id' => '4',
                    'perfil_acesso_id' => '1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]*/
            ]
        );
    }
}
