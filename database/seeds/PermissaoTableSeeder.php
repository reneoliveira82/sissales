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

                // ##################ATRIBUIR USUÁRIO AO SERVIÇO##################
                // [
                //     'nome' => 'view_user_service',
                //     'descricao' => 'Visualizar',
                //     'grupo' => 'Atribuir_Usuário_ao_Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // [
                //     'nome' => 'create_user_service',
                //     'descricao' => 'Atribuir',
                //     'grupo' => 'Atribuir_Usuário_ao_Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // ##################SERVIÇO##################
                // [
                //     'nome' => 'view_servico',
                //     'descricao' => 'Visualizar',
                //     'grupo' => 'Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // [
                //     'nome' => 'create_servico',
                //     'descricao' => 'Cadastrar',
                //     'grupo' => 'Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // [
                //     'nome' => 'edit_servico',
                //     'descricao' => 'Editar',
                //     'grupo' => 'Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // [
                //     'nome' => 'delete_servico',
                //     'descricao' => 'Deletar',
                //     'grupo' => 'Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // [
                //     'nome' => 'end_servico',
                //     'descricao' => 'Finalizar',
                //     'grupo' => 'Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // [
                //     'nome' => 'validate_servico',
                //     'descricao' => 'Validar',
                //     'grupo' => 'Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],

                // [
                //     'nome' => 'publish_servico',
                //     'descricao' => 'Publicar',
                //     'grupo' => 'Serviço',
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ],
            ]
        );
    }
}
