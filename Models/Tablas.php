<?php

//namespace FUMESAR;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablas extends Model
{
    protected $table='tablas';

    protected $primaryKey='idtablas';

    public $timestamps=false;


    protected $fillable =[
    	'idtablas','NombreTabla','Tipo','Opcion','Grupo','Orden','Icono','IconoGrupo'
    ];

    protected $guarded =[

    ];
}
