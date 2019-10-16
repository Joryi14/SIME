<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Noticia extends Model
{
    protected  $fillable  = [ 'FechaPublicacion','Titulo','IdAutor','Imagenes','Videos','Articulo','PDF', 'NombrePDF'];
    protected $table = 'noticias';
    protected  $primaryKey  =  'IdNoticias';
    public function user()
    {
        return $this->belongsTo('App\User', 'IdAutor');
    }
}