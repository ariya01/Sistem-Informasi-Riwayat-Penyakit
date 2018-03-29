<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $table ='detail';
    
    protected $primaryKey = 'id_det';
    protected $fillable = ['id_user', 'alamat'];

    public function user()
    {
    	return $this->belongTo(User::class);
    }
        
}
