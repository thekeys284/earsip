<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='role';
    protected $fillable=['role'];
    protected $hidden;
}
