<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'sw_users';
    public $primaryKey = 'Uid';
    public $timestamps = true;
}
