<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso_colegio extends Model
{
    protected $table='curso_colegio';

    protected $primaryKey='idCursoCol';

    public $timestamps=false;


    protected $fillable =[
    	'idCursoCol','Curso'
    ];

    protected $guarded =[

    ];
}
