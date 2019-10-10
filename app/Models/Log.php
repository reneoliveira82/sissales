<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'id_user',
        'id_servidor',
        'atualizado_em_data',
    ];
    //
}
