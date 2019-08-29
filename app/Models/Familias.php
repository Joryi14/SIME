<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familias extends Model
{
    protected $fillable = ['IdJefeF','Nombre', 'Apellido1','Apellido2','Cedula','Parentesco','Edad','sexo','PcD','MG','PI','PM','Patologia'];
    protected $table = 'familia';
    protected $primaryKey = 'IdFamilia';
}
