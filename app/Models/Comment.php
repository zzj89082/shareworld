<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use SoftDeletes;
    //指定表
    public $table = 'sw_discuss';
    //指定主键
    public $primaryKey = 'Did';

    /* 评论回复-属于关系 */
    //用户----属于关系
    public function comment_users()
    {
    	return $this->belongsTo('App\User','Uid');
    }
    // 发布微博-属于关系
    public function comment_release()
    {
        return $this->belongsTo('App\Models\Release','Eid');
    }
    // 内容资讯-属于关系
    public function comment_content()
    {
        return $this->belongsTo('App\Models\Content','Cid');
    }
}
