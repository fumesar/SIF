<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
    	'name','guard_name',
    ];
    
    

    protected $guarded =[

    ];
}
