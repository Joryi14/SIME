<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['nombre','iso'];
    protected $table = 'paises';
    protected $primaryKey = 'id';
}
