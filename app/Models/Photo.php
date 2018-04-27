<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //指定表
    public $table = 'sw_photo';
    //指定主键
    public $primaryKey = 'Pid';
}
