<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emergencia extends Model
{
    protected $fillable = ['NombreEmergencias', 'Categoria','TipoDeEmergencia', 'Descripcion','Longitud', 'Latitud','Estado','Radio'];
    protected $table = 'emergencia';
    protected $primaryKey = 'idEmergencias';
}
