<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jefatura extends Model
{
    protected $table='jefatura';

    protected $primaryKey='idJefatura';

    public $timestamps=false;


    protected $fillable =[
    	'idJefatura','idTipoDocumento','NumeroDocumento','Nombres','Apellidos','FechaNacimiento','idDepartamentoNacimiento','CiudadNacimiento','idRH','Correo','Telefono','idNivelAcademico','Direccion','idDepartamentoResidencia','CiudadResidencia','idLocalidad','Barrio','idEstado','idRango','idCargo','idSeccional','idBrigada','idPeloton','FechaIngreso','idPuesto','Antiguedad','FechaAscenso','FechaRetiro','Foto'
    ];

    protected $guarded =[

    ];

    public function scopeRango($query, $idRango){
    	if($idRango){
    		$query->where('jefatura.idRango',$idRango);
    	}
    }
    public function scopeEstado($query, $idEstado){
    	if($idEstado){
    		$query->where('jefatura.idEstado',$idEstado);
    	}
    }
    public function scopePuesto($query, $idPuesto){
    	if($idPuesto){
    		$query->where('jefatura.idPuesto',$idPuesto);
    	}
    }
    public function scopeSeccional($query, $idSeccional){
    	if($idSeccional){
    		$query->where('jefatura.idSeccional',$idSeccional);
    	}
    }
    public function scopeBrigada($query, $idBrigada){
    	if($idBrigada){
    		$query->where('jefatura.idBrigada',$idBrigada);
    	}
    }
}
