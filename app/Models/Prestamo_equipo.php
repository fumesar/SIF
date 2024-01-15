<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo_equipo extends Model
{
    protected $table='prestamo_equipo';

    protected $primaryKey='idPrestamoEquipo';

    public $timestamps=false;


    protected $fillable =[
    	'idPrestamoEquipo','NroDocumento','idEquipo','Referencia','FechaVencimiento','Nota'
    ];

    protected $guarded =[

    ];
}
