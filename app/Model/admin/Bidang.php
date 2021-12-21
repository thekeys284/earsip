<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang'; 
    protected $fillable = [
        'id','bidang','kode_bidang','email','alternatif_email','created_at','updated_at'
    ];
}
