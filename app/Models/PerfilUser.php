<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilUser extends Model
{
    protected $fillable = [
        'user_id',
        'perfil_acesso_id'
    ];
}
