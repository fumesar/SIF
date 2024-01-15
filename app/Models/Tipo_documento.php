<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    protected $table='tipo_documento';

    protected $primaryKey='idTipoDocumento';

    public $timestamps=false;


    protected $fillable =[
    	'idTipoDocumento','TipoDocumento'
    ];

    protected $guarded =[

    ];
}
