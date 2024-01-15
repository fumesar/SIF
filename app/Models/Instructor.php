<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table='instructor';

    protected $primaryKey='idinstructor';

    public $timestamps=false;


    protected $fillable =[
    	'idinstructor','Documento','Nombres','Apellidos','Correo','Telefono','idEstado'
    ];

    protected $guarded =[

    ];
}
