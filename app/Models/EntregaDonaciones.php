<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EntregaDonaciones extends Model
{
    protected  $fillable  = [ 'IdVoluntario','IdJefe','IdRetiroPaquetes','Foto'];
    protected $table = 'entregadonaciones';
    protected  $primaryKey  =  'IdEntrega';
}