<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructoresxcurso extends Model
{
    protected $table='instructoresxcurso';

    protected $primaryKey='idInstructoresxCurso';

    public $timestamps=false;


    protected $fillable =[
    	'idInstructoresxCurso','idinstructor','idCurso'
    ];

    protected $guarded =[

    ];
}
