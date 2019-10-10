<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'id',
        'id_servidor',
        'ddd1',
        'tel_resid_1',
        'ddd2',
        'tel_resid_2', 
        'ddd_cel',
        'celular', 
        'email'
      ];
}
