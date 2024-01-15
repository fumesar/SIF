<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table='profesion';

    protected $primaryKey='idProfesion';

    public $timestamps=false;


    protected $fillable =[
    	'idProfesion','Profesion'
    ];

    protected $guarded =[

    ];
}
