<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mensajeria extends Model
{
    protected  $fillable  = [ 'CodigoIncidente','Descripcion','Longitud','Latitud','Hora','Fecha','Categoria','IdLiderComunal',];
    protected $table = 'mensajeria';
    protected  $primaryKey  =  'IdMensajeria';
    protected $acciones = array();

    public function Accion()
    {
        return $this->hasMany('App\Models\Acciones','idMensajeria','IdMensajeria');
    }
    public function Emergencia()
    {
        return $this->belongsTo('App\Models\Emergencia','idEmergencia');
    }
    public function LiderComunal()
    {
        return $this->belongsTo('App\User','IdLiderComunal');
    }
}
