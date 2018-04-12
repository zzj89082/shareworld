<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rollimg extends Model
{
    //更改表名
    public $table = 'sw_rollimg';
    //默认id
    public $primaryKey = 'Rid';
    //软删除
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	
}
