<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table='seksi';
    protected $fillable=[
        'id','seksi','kode_seksi','kode_bidang','kode_satker','email','alternatif_email','created_at','updated_at',
    ];
}
