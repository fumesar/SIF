<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento_nacimiento extends Model
{
    protected $table='departamento_nacimiento';

    protected $primaryKey='idDepartamentoNacimiento';

    public $timestamps=false;


    protected $fillable =[
    	'idDepartamentoNacimiento','DepartamentoNacimiento'
    ];

    protected $guarded =[

    ];
}
