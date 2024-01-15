<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table='cargo';

    protected $primaryKey='idCargo';

    public $timestamps=false;


    protected $fillable =[
    	'idCargo','Cargo'
    ];

    protected $guarded =[

    ];
}
