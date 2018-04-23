<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Content extends Model
{
    //指定表
    public $table = 'sw_contents';
    //指定主键
    public $primaryKey = 'Cid';


    public function content_user()
    {
        return $this->belongsTo('App\User','Uid');
    }

    //获取哪个用户发送的
	public function novelty_user()
	{
		return $this->belongsTo('App\Models\Admin\User','Uid');
	}    


}
