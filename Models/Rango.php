<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model
{
    protected $table='rango';

    protected $primaryKey='idRango';

    public $timestamps=false;


    protected $fillable =[
    	'idRango','Rango'
    ];

    protected $guarded =[

    ];
}
