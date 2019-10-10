<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissaos')->insert(
            [
                ##################Função##################
                [
                    'nome' => 'view_funcao',
                    'descricao' => 'Visualizar',
                    'grupo' => 'Função',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'create_funcao',
                    'descricao' => 'Cadastrar',
                    'grupo' => 'Função',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'edit_funcao',
                    'descricao' => 'Editar',
                    'grupo' => 'Função',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'delete_funcao',
                    'descricao' => 'Deletar',
                    'grupo' => 'Função',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                ##################PERFIL DE ACESSO##################
                [
                    'nome' => 'view_perfil_acesso',
                    'descricao' => 'Visualizar',
                    'grupo' => 'Perfil_de_Acesso',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'create_perfil_acesso',
                    'descricao' => 'Cadastrar',
                    'grupo' => 'Perfil_de_Acesso',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'edit_perfil_acesso',
                    'descricao' => 'Editar',
                    'grupo' => 'Perfil_de_Acesso',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'delete_perfil_acesso',
                    'descricao' => 'Deletar',
                    'grupo' => 'Perfil_de_Acesso',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                ##################PERFIL PERMISSÂO##################
                [
                    'nome' => 'view_perfil_permissao',
                    'descricao' => 'Visualizar',
                    'grupo' => 'Perfil_Permissão',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'create_perfil_permissao',
                    'descricao' => 'Cadastrar',
                    'grupo' => 'Perfil_Permissão',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'edit_perfil_permissao',
                    'descricao' => 'Editar',
                    'grupo' => 'Perfil_Permissão',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'delete_perfil_permissao',
                    'descricao' => 'Deletar',
                    'grupo' => 'Perfil_Permissão',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                ##################USUÁRIOS##################
                [
                    'nome' => 'view_user',
                    'descricao' => 'Visualizar',
                    'grupo' => 'Usuário',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'create_user',
                    'descricao' => 'Cadastrar',
                    'grupo' => 'Usuário',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'edit_user',
                    'descricao' => 'Editar',
                    'grupo' => 'Usuário',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'delete_user',
                    'descricao' => 'Deletar',
                    'grupo' => 'Usuário',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                // ##################  RECADASTRAMENTO ##################
                [
                    'nome' => 'view_recadastramento',
                    'descricao' => 'Visualizar',
                    'grupo' => 'Recadastramento',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],       

                [
                    'nome' => 'edit_recadastramento',
                    'descricao' => 'Editar',
                    'grupo' => 'Recadastramento',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                 // ################## RELATÓRIO RECADASTRAMENTO ##################

                 [
                    'nome' => 'view_relatorio_recadastramento',
                    'descricao' => 'Visualizar',
                    'grupo' => 'Relatorio_Recadastramento',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ], 
                // ################## SAC UNIDADE ##################  
                [
                    'nome' => 'view_sac_unidade',
                    'descricao' => 'Visualizar',
                    'grupo' => 'Sac_Unidade',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'nome' => 'create_sac_unidade',
                    'descricao' => 'Cadastrar',
                    'grupo' => 'Sac_Unidade',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'nome' => 'edit_sac_unidade',
                    'descricao' => 'Editar',
                    'grupo' => 'Sac_Unidade',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'nome' => 'delete_sac_unidade',
                    'descricao' => 'Deletar',
                    'grupo' => 'Sac_Unidade',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]
        );
    }
}
