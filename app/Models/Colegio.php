<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $table='colegio';

    protected $primaryKey='idColegio';

    public $timestamps=false;


    protected $fillable =[
    	'idColegio','Colegio'
    ];

    protected $guarded =[

    ];
}
