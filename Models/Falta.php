<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $table='falta';

    protected $primaryKey='idfalta';

    public $timestamps=false;


    protected $fillable =[
    	'idfalta','Falta'
    ];

    protected $guarded =[

    ];
}
