<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    protected $table='tercero';

    protected $primaryKey='idTercero';

    public $timestamps=false;


    protected $fillable =[
    	'idTercero','idTipoTercero','idTipoDocumento','NumeroDocumento','Nombres','Apellidos','FechaNacimiento','idDepartamentoNacimiento','CiudadNacimiento','idRH','Correo','Telefono','Direccion','idDepartamentoResidencia','idProfesion','CiudadResidencia','idNivelAcademico','idLocalidad','Barrio','idEstado','idCargo','FechaIngreso','FechaRetiro','Foto'
    ];

    protected $guarded =[

    ];
}
