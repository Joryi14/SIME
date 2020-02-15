<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mensajeria extends Model
{
    protected  $fillable  = [ 'CodigoIncidente','Descripcion','Ubicacion','Hora','Fecha','Categoria','IdLiderComunal','idEmergencia'];
    protected $table = 'mensajeria';
    protected  $primaryKey  =  'IdMensajeria';
    public function Emergencia()
    {
        return $this->belongsTo('App\Models\Emergencia','idEmergencia');
    }
    public function LiderComunal()
    {
        return $this->belongsTo('App\User','IdLiderComunal');
    }
}
