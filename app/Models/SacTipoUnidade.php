<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SacTipoUnidade extends Model
{
    protected $fillable = [
        'id',
        'cod_tipo',
        'tipo_descricao'
    ];
}
