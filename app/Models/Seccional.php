<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccional extends Model
{
    protected $table='seccional';

    protected $primaryKey='idSeccional';

    public $timestamps=false;


    protected $fillable =[
    	'idSeccional','Seccional'
    ];

    protected $guarded =[

    ];
}
