<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antiguedad extends Model
{
    protected $table='antiguedad';

    protected $primaryKey='idantiguedad';

    public $timestamps=false;


    protected $fillable =[
    	'idantiguedad','idRango','anos','idRangoAnterior'
    ];

    protected $guarded =[

    ];
}
