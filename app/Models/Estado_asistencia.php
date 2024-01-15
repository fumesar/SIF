<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado_asistencia extends Model
{
    protected $table='estado_asistencia';

    protected $primaryKey='idEstadoAsistencia';

    public $timestamps=false;


    protected $fillable =[
    	'idEstadoAsistencia','EstadoAsistencia'
    ];

    protected $guarded =[

    ];
}
