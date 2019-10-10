<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SacTipoUnidadeTableSeeder::class);
        $this->call(SacUnidadeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissaoTableSeeder::class);
        $this->call(PerfilAcessoTableSeeder::class);
        $this->call(PerfilPermissaoTableSeeder::class);
        $this->call(PerfilUserTableSeeder::class);
    }
}
