<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permissao;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permissao::with('perfilAcessos')->get();
        //dd($permissions);
        foreach ($permissions as $p){
            Gate::define($p->nome, function(User $user) use ($p){
                return $user->verificaPermissao($p);
            });
        }

        Gate::before(function(User $user){
            if($user->verificaPerfil('Administrador'))
                return true;
        });
    }
}
