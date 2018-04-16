<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //指定表
    public $table = 'sw_contents';
    //指定主键
    public $primaryKey = 'Cid';


    public function content_type()
    {
        return $this->belongsTo('App\Models\Type','Tid');
    }

}