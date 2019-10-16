<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasAlbergue extends Model
{
    protected  $fillable  = ['idAlbergue','idJefe','idEmergencias','LugarDeProcedencia','FechaDeIngreso','HoraDeIngreso','FechaDeSalida','HoraDeSalida'];
    protected $table = 'registropersonaalbergue';
    protected $primaryKey ='idregistroA';
    public function jefeFamilia()
    {
        return $this->belongsTo('App\Models\JefeDeFamilia', 'idJefe');
    }
}
