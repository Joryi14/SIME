<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acciones extends Model
{
    protected  $fillable  = ['idMensajeria','titulo','descripcion'];
    protected $table = 'acciones';
    protected $primaryKey ='id';
}
