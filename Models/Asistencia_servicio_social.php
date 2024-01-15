<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia_servicio_social extends Model
{
    protected $table='asistencia_servicio_social';

    protected $primaryKey='idAsistencia';

    public $timestamps=false;


    protected $fillable =[
    	'idAsistencia','Fecha','idServicioSocial','idEstadoAsistencia'
    ];

    protected $guarded =[

    ];
}
