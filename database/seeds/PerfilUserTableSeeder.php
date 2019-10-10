<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PerfilUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil_users')->insert(
            [
                [
                    'user_id' => '1',
                    'perfil_acesso_id' => '1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]
        );
    }
}
