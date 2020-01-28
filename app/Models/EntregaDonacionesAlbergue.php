<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EntregaDonacionesAlbergue extends Model
{
    protected  $fillable  = ['IdJefeFa','idAlbergue','idEmergencias'];
    protected $table = 'entregadonacionesalbergue';
    protected  $primaryKey  =  'IdEntregaA';
    public function jefeFamilia()
    {
        return $this->belongsTo('App\Models\JefeDeFamilia', 'IdJefeFa');
    }
    public function Emergencia()
    {
        return $this->belongsTo('App\Models\Emergencia', 'idEmergencias');
    }
    public function Albergue()
    {
        return $this->belongsTo('App\Models\Albergue', 'idAlbergue');
    }
}