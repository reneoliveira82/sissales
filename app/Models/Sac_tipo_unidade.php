<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sac_tipo_unidade extends Model
{
    protected $fillable = [
        'id',
        'cod_tipo',
        'tipo_descricao'
    ];
}
