<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado_equipo extends Model
{
    protected $table='estado_equipo';

    protected $primaryKey='idEstadoEquipo';

    public $timestamps=false;


    protected $fillable =[
    	'idEstadoEquipo','EstadoEquipo'
    ];

    protected $guarded =[

    ];
}
