<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $fillable = [
        'id',
        'cod_status',
        'desc_status'
      ];
}
