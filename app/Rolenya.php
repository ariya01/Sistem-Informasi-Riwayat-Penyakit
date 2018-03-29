<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolenya extends Model
{
    //
    protected $table ='role_user';
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'role_id'];
}
