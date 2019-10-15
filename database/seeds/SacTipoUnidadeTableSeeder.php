<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
class SacTipoUnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sac_tipo_unidades')->insert(
            [
                [
                    'cod_tipo' => '2',
                    'tipo_descricao' => 'Posto Fixo Capital e Região Metropolitana',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]   
        );
    }
}