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

    //获取哪个用户发送的
	public function novelty_user()
	{
		return $this->belongsTo('App\Models\Admin\User','Uid');
	}    

	//获取内容的评论
	
}
