<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $fillable = ['name','guard_name'];
    protected $table = 'permissions';
    protected $primaryKey = 'id';
}
