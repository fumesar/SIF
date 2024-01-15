<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado_jefatura extends Model
{
    protected $table='estado_jefatura';

    protected $primaryKey='idEstado';

    public $timestamps=false;


    protected $fillable =[
    	'idEstado','Estado'
    ];

    protected $guarded =[

    ];
}
