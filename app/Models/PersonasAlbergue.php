<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasAlbergue extends Model
{
    protected  $fillable  = ['idAlbergue','idJefe','LugarDeProcedencia','FechaDeIngreso','HoraDeIngreso','FechaDeSalida','HoraDeSalida'];
    protected $table = 'registropersonaalbergue';
    protected $primaryKey ='idregistroA';
}
