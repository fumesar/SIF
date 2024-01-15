<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricular extends Model
{
    protected $table='matricular';

    protected $primaryKey='idMatricula';

    public $timestamps=false;


    protected $fillable =[
    	'idMatricula','idSemestre','Documento','Nombres','Apellidos','idCurso','idEstadoMatricula'
    ];

    protected $guarded =[

    ];
}
