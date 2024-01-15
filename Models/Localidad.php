<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table='localidad';

    protected $primaryKey='idLocalidad';

    public $timestamps=false;


    protected $fillable =[
    	'idLocalidad','Localidad'
    ];

    protected $guarded =[

    ];
}
