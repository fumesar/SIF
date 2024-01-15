<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table='jornada';

    protected $primaryKey='idJornada';

    public $timestamps=false;


    protected $fillable =[
    	'idJornada','Jornada'
    ];

    protected $guarded =[

    ];
}
