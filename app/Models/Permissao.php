<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function perfilAcessos()
    {
        return $this->belongsToMany(PerfilAcesso::class, 'perfil_permissaos');
    }
}
