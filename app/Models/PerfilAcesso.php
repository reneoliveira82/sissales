<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilAcesso extends Model
{
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function permissoes()
    {
        return $this->belongsToMany(\App\Models\Permissao::class, 'perfil_permissaos');
    }
}
