<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mensajeria extends Model
{
    protected  $fillable  = [ 'CodigoIncidente','Descripcion','Ubicacion','Hora','Fecha','Categoria','IdUsuarioRol'];
    protected $table = 'mensajeria';
    protected  $primaryKey  =  'IdMensajeria';
}