<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table='asignatura';

    protected $primaryKey='idAsignatura';

    public $timestamps=false;


    protected $fillable =[
    	'idAsignatura','NombreAsignatura','idCurso','idinstructor','idEstado'
    ];

    protected $guarded =[

    ];
}
