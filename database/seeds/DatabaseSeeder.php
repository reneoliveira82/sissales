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
        $this->call(UsersTableSeeder::class);
        $this->call(PermissaoTableSeeder::class);
        $this->call(PerfilAcessoTableSeeder::class);
        $this->call(PerfilPermissaoTableSeeder::class);
        $this->call(PerfilUserTableSeeder::class);        
    }
}
