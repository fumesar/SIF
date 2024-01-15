<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peloton extends Model
{
    protected $table='peloton';

    protected $primaryKey='idPeloton';

    public $timestamps=false;


    protected $fillable =[
    	'idPeloton','Peloton'
    ];

    protected $guarded =[

    ];
}
