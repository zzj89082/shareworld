<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Poster extends Model
{
	use SoftDeletes;
    //限定表
    public $table = 'sw_poster';
    //限定id
    public $primaryKey = 'POid';
    //模型的日期字段保存格式
    protected $dataFormat ='U';
}
