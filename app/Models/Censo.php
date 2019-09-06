<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Censo extends Model
{
    protected $fillable = ['IdJefeFam', 'Refrigerador','Cocina', 'Colchon','Cama'];
    protected $table = 'censo';
    protected $primaryKey = 'IdCenso';
    public function jefeFamilia()
    {
        return $this->belongsTo('App\Models\JefeDeFamilia', 'IdJefeFam');
    }
}
