<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class VoluntarioWeb extends Model
{
    protected  $fillable  = ['NombreVoluntarioWeb','ApellidoVoluntario1Web','ApellidoVoluntario2Web','CedulaVoluntarioWeb','TelefonoVoluntarioWeb','NacionalidadVoluntarioWeb','OcupacionWeb', 'PatologiaWeb'];
    protected $table = 'voluntarioweb';
    protected  $primaryKey  =  'IdVoluntarioWeb';
}