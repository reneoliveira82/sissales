<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SacUnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sac_unidades')->insert(
            [
                [
                    'unid_descricao' => 'PERIPERI',
                    'id_sac_tipo_unid' => '1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

            ]   
    );
    }
}
