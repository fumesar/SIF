<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursocol extends Model
{
    protected $table='cursocol';

    protected $primaryKey='idCursoCol';

    public $timestamps=false;


    protected $fillable =[
    	'idCursoCol','Curso'
    ];

    protected $guarded =[

    ];
}
