<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EntregaDonaciones extends Model
{
    protected  $fillable  = [ 'IdVoluntario','IdJefe','IdRetiroPaquetes','Foto','idEmergencia','Cantidad'];
    protected $table = 'entregadonaciones';
    protected  $primaryKey  =  'IdEntrega';
    public function User()
    {
        return $this->belongsTo('App\User', 'IdVoluntario');
    }
    public function jefeFamilia()
    {
        return $this->belongsTo('App\Models\JefeDeFamilia', 'IdJefe');
    }
    public function Emergencia()
    {
        return $this->belongsTo('App\Models\Emergencia', 'idEmergencia');
    }
    
}