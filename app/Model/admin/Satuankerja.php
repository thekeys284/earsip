<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Satuankerja extends Model
{
    protected $table='satuan_kerja';
    protected $fillable=[
        'id','kode_satker','nama_satker','email','alternatif_email','no_telepon','alamat_kantor','created_at','updated_at',
    ];
}
