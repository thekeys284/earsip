<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Listseksi extends Model
{
    protected $table='listseksi';
    protected $fillable=[
        'id','kode_seksi','seksi','singkatan','level','created_at','updated_at',
    ];
}
