<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permisoRol extends Model
{
    protected $fillable = ['permission_id','role_id'];
    protected $table = 'role_has_permissions';
    public $timestamps = false;
}
