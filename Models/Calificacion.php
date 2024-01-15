<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table='calificacion';

    protected $primaryKey='idCalificacion';

    public $timestamps=false;


    protected $fillable =[
    	'idCalificacion','idSemestre','idCurso','idAsignatura','idJefatura','Nota','Promedio'
    ];

    protected $guarded =[

    ];
}
