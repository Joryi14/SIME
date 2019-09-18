<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Noticia extends Model
{
    protected  $fillable  = [ 'FechaPublicacion','Titulo','IdAutor','Imagenes','Videos','Articulo','PDF'];
    protected $table = 'noticias';
    protected  $primaryKey  =  'IdNoticias';
}