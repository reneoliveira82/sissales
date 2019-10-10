<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
use App\Models\Permissao;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
            'id',
            'id_sac_unidade',
            'id_funcao',    
            'name',
            'email',
            'password',
            'cpf',
            'matricula',
            'telefone',
            'solicita_conta',
            'ativo'
  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    
    public function perfilAcessos()
    {
        return $this->belongsToMany(\App\Models\PerfilAcesso::class, 'perfil_users');
    }

    public function verificaPermissao(Permissao $permissao)
    {
        //dd($permissao->perfilAcessos());
        return $this->verificaPerfil($permissao->perfilAcessos);
    }

    public function verificaPerfil($perfil)
    {
        //dd($perfil);
        if(is_array($perfil) || is_object($perfil)){
            return !! $perfil->intersect($this->perfilAcessos)->count();
            /*foreach ($perfil as $p) {
                //dd($this->perfilAcessos);
                //var_dump($p->nome);
                //return $this->perfilAcessos->contains('nome', $p->nome);
                return $this->verificaPerfil($p);
            }*/
        }
        return $this->perfilAcessos->contains('nome', $perfil);
    }
}
