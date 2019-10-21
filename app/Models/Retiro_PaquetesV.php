<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retiro_PaquetesV extends Model
{
  //
        protected  $fillable  = [ 'IdAdministradorI','NombreChofer','Apellido1C','Apellido2C',
        'IdVoluntario','PlacaVehiculo','DireccionAEntregar','SuministrosGobierno',
        'SuministrosComision','IdInventario'];
    protected $table = 'retiropaquetes';
    protected $primaryKey ='IdRetiroPaquetes';
}
