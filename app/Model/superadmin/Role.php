<?php

namespace App\Model\superadmin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='role';
    protected $fillable = [
        'id','role','created_at','updated_at',
    ];
}
