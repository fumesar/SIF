<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento_residencia extends Model
{
    protected $table='departamento_residencia';

    protected $primaryKey='idDepartamentoResidencia';

    public $timestamps=false;


    protected $fillable =[
    	'idDepartamentoResidencia','DepartamentoResidencia'
    ];

    protected $guarded =[

    ];
}
