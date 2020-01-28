<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $fillable = ['model_type','model_id','role_id'];
    protected $table = 'model_has_roles';
    protected $primaryKey ='model_id';
    public $timestamps = false;
    public function roles()
    {
        return $this->belongsTo('App\Models\roles','role_id');
    }
    public function model()
    {
        return $this->belongsTo('App\User','model_id');
    }
}
