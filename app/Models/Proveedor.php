<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';

    protected $primaryKey='idProveedor';

    public $timestamps=false;


    protected $fillable =[
    	'idProveedor','idTipoDocumento','NumeroDocumento','Nombres','Apellidos','Direccion','idDepartamentoResidencia','CiudadResidencia','Telefono','Celular','PersonaContacto','PaginaWeb','Correo'
    ];

    protected $guarded =[

    ];
}
