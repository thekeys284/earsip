<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use softDeletes;
    protected $table='role';
    protected $fillable =['id','role'];
    protected $hidden;
}
