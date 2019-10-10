<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilPermissao extends Model
{
    protected $fillable = [
        'perfil_acesso_id',
        'permissao_id'
    ];
}
