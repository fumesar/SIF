<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursoxrango extends Model
{
    protected $table='cursoxrango';

    protected $primaryKey='idCursoxRango';

    public $timestamps=false;


    protected $fillable =[
    	'idCursoxRango','idRango','idCurso'
    ];

    protected $guarded =[

    ];
}
