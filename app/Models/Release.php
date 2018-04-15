<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    //指定表
    public $table = 'sw_release';
    //指定主键
    public $primaryKey = 'Eid';
}
