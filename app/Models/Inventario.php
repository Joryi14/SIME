<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inventario extends Model
{
    protected  $fillable  = [ 'idEmergencias','Suministros','Colchonetas','Cobijas','Ropa'];
    protected $table = 'inventario';
    protected  $primaryKey  =  'idInventario';

    public function Emergencia()
    {
        return $this->belongsTo('App\Models\Emergencia','idEmergencias');
    }
}