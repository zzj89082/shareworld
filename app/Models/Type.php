<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //更改表名
    public $table = 'sw_type';
    //默认id
    public $primaryKey = 'Tid';
}
