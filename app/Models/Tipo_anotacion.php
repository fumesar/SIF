<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_anotacion extends Model
{
    protected $table='tipo_anotacion';

    protected $primaryKey='idTipoAnotacion';

    public $timestamps=false;


    protected $fillable =[
    	'idTipoAnotacion','TipoAnotacion'
    ];

    protected $guarded =[

    ];
}
