<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JefeDeFamilia extends Model
{
    protected $fillable = ['TotalPersonas','Nombre', 'Apellido1','Apellido2','Cedula','Edad','sexo','Telefono','PcD','MG','PI','PM','Patologia'];
    protected $table = 'jefedefamilia';
    protected $primaryKey = 'IdJefe';
}
