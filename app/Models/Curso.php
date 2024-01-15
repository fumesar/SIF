<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table='curso';

    protected $primaryKey='idCurso';

    public $timestamps=false;


    protected $fillable =[
    	'idCurso','NombreCurso','idEstado','idSemestre'
    ];

    protected $guarded =[

    ];
}
