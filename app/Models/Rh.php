<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rh extends Model
{
    protected $table='rh';

    protected $primaryKey='idRH';

    public $timestamps=false;


    protected $fillable =[
    	'idRH','RH'
    ];

    protected $guarded =[

    ];
}
