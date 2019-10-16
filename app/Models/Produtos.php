<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [
        'id',
        'cod_produto',
        'nome_produto',
        'qtd_produto',
        'preco_unit'

    ];
}
