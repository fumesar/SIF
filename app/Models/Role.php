<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
    	'name','guard_name',
    ];
    
    

    protected $guarded =[

    ];
}
