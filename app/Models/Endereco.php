<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'id',
        'id_servidor',
        'id_tipo_lograd',
        'id_municipio',
        'id_pais',
        'logradouro',
        'numero', 
        'compl_logradouro',
        'bairro', 
        'uf_endereco',
        'cep',
        'id_pais'

      ];
}
