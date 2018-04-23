<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Release extends Model
{
	use SoftDeletes;
    //更改表名
    public $table = 'sw_release';
    //更改id
    public $primaryKey = 'Eid';
    public function release_user()
    {
        return $this->belongsTo('App\Models\Admin\User','Ualais');
    }

}

