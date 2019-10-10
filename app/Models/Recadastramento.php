<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recadastramento extends Model
{
    protected $fillable = [
        'name',
        'matricula',
        'cpf'
    ];
}
