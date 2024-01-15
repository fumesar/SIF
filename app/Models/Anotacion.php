<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anotacion extends Model
{
    protected $table='anotacion';

    protected $primaryKey='idAnotacion';

    public $timestamps=false;


    protected $fillable =[
    	'idAnotacion','idJefatura','Identificacion','Nombres','Apellidos','idTipoAnotacion','Fecha','Titulo','idfalta','Observacion'
    ];

    protected $guarded =[

    ];
}
