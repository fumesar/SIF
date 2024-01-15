<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel_academico extends Model
{
    protected $table='nivel_academico';

    protected $primaryKey='idNivelAcademico';

    public $timestamps=false;


    protected $fillable =[
    	'idNivelAcademico','NivelAcademico'
    ];

    protected $guarded =[

    ];
}
