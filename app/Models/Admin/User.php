<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    public $table = 'sw_users';
    public $primaryKey = 'Uid';
    public $timestamps = true;

}
