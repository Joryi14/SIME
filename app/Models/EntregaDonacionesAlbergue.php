<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EntregaDonacionesAlbergue extends Model
{
    protected  $fillable  = [ 'IdJefeFa'];
    protected $table = 'entregadonacionesalbergue';
    protected  $primaryKey  =  'IdEntregaA';
}