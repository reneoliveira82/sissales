<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
  protected $fillable = [
    'id',
    'pais_orig',
    'id_nacion',    
    'id_est_civil',
    'id_municipio',
    'id_status',
    'id_contato',
    'id_endereco',
    'orgao',
    'matricula',
    'nome',
    'dt_nasc',
    'uf_nat', 
    'mun_origem',
    'sexo', 
    'nome_pai',
    'nome_mae',
    'rg', 
    'cpf', 
    'org_exp_rg',
    'uf', 
    'dt_exp_rg',
    'pis_pasep', 
    'tit_eleitor', 
    'zona', 
    'secao',
    'uf_exp_tit',
    'dt_exp_tit',
    'sei',
    'num_cnh',    
    'dt_val_cnh',
    'cert_obito'
  ];
}
