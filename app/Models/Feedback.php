<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Feedback extends Model
{
	use SoftDeletes;
    //指定表
    public $table = 'sw_feedback';
    //指定主键
    public $primaryKey = 'Fid';

    // 属于关系
    public function feedback_users()
    {
    	return $this->belongsTo('App\User','Uid');
    }
}
