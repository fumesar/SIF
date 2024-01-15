<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table='asistencia';

    protected $primaryKey='idAsistencia';

    public $timestamps=false;


    protected $fillable =[
    	'idAsistencia','idCurso','Fecha','idMatricula','idEstadoAsistencia'
    ];

    protected $guarded =[

    ];
}
