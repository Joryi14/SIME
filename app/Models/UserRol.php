<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $fillable = ['model_type','model_id','role_id'];
    protected $table = 'model_has_roles';
    public $timestamps = false;
}
