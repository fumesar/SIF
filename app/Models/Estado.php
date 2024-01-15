<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estado';

    protected $primaryKey='idEstado';

    public $timestamps=false;


    protected $fillable =[
    	'idEstado','Estado'
    ];

    protected $guarded =[

    ];
}
