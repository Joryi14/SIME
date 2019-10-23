<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EntregaDonacionesAlbergue extends Model
{
    protected  $fillable  = ['IdJefeFa','idAlbergue','idEmergencias'];
    protected $table = 'entregadonacionesalbergue';
    protected  $primaryKey  =  'IdEntregaA';
}