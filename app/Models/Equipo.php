<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table='equipo';

    protected $primaryKey='idEquipo';

    public $timestamps=false;


    protected $fillable =[
    	'idEquipo','NombreEquipo','Referencia','Cantidad','NroEstante'
    ];

    protected $guarded =[

    ];
}
