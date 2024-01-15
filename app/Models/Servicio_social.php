<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio_social extends Model
{
    protected $table='servicio_social';

    protected $primaryKey='idServicioSocial';

    public $timestamps=false;


    protected $fillable =[
    	'idServicioSocial','idTipoDocumento','NumeroDocumento','Nombres','Apellidos','Telefono','Direccion','idDepartamentoResidencia','CiudadResidencia','Correo','idLocalidad','Barrio','idColegio','idCursoCol','idJornada','Horas','idEstado','idSeccional','idBrigada','idPeloton','FechaIngreso','FechaFinalizacion','idSemestre','Foto'
    ];

    protected $guarded =[

    ];

    public function scopeEstado($query, $idEstado){
    	if($idEstado){
    		$query->where('servicio_social.idEstado',$idEstado);
    	}
    }
    public function scopeSeccional($query, $idSeccional){
    	if($idSeccional){
    		$query->where('servicio_social.idSeccional',$idSeccional);
    	}
    }
    public function scopeBrigada($query, $idBrigada){
    	if($idBrigada){
    		$query->where('servicio_social.idBrigada',$idBrigada);
    	}
    }
    public function scopePeloton($query, $idPeloton){
    	if($idPeloton){
    		$query->where('servicio_social.idPeloton',$idPeloton);
    	}
    }
    public function scopeColegio($query, $idColegio){
        if($idColegio){
            $query->where('servicio_social.idColegio',$idColegio);
        }
    }
    public function scopeSemestre($query, $idSemestre){
        if($idSemestre){
            $query->where('servicio_social.idSemestre',$idSemestre);
        }
    }
    public function scopeCertificado($query){
        if(!auth()->user()->hasRole('Administrador')){
            $query->where('servicio_social.idColegio',auth()->user()->idColegio);
        }
    }
}
