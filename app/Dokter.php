<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $table ='dokter';
    public $timestamps = false;
    protected $primaryKey = 'id_dokter';
    protected $fillable = ['id_user', 'id_strata','id_univ','id_pendidikan','id_spesialis'];
}
