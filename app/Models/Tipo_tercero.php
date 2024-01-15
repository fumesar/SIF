<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_tercero extends Model
{
    protected $table='tipo_tercero';

    protected $primaryKey='idTipoTercero';

    public $timestamps=false;


    protected $fillable =[
    	'idTipoTercero','TipoTercero'
    ];

    protected $guarded =[

    ];
}
