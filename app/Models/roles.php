<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = ['name','guard_name'];
    protected $table = 'roles';
    protected $primaryKey = 'id';
}
