<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brigada extends Model
{
    protected $table='brigada';

    protected $primaryKey='idBrigada';

    public $timestamps=false;


    protected $fillable =[
    	'idBrigada','Brigada'
    ];

    protected $guarded =[

    ];
}
