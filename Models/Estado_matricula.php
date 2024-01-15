<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado_matricula extends Model
{
    protected $table='estado_matricula';

    protected $primaryKey='idEstadoMatricula';

    public $timestamps=false;


    protected $fillable =[
    	'idEstadoMatricula','EstadoMatricula'
    ];

    protected $guarded =[

    ];
}
