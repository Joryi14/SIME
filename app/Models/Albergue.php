<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Albergue extends Model
{
    protected  $fillable  = ['Nombre','Distrito','Comunidad','TipoDeInstalacion','Capacidad','model_id','telefono','Duchas','inodoros','EspacioDeCocina','Bodega','Longitud','Latitud','Nececidades'];
    protected $table = 'albergue';
    protected $primaryKey ='idAlbergue';
    public function User()
    {
        return $this->belongsTo('app\User', 'model_id');
    }
}
