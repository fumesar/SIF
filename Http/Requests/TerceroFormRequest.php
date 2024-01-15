<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TerceroFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        switch ($this->method()) {
            case 'POST':    //Nuevo
                $rules = [
                    'idTipoTercero'=>'required',
                    'idTipoDocumento'=>'required',
                    'NumeroDocumento'=>'required|unique:tercero|max:20',
                    'Nombres'=>'required|max:50',
                    'Apellidos'=>'required|max:50',
                    'FechaNacimiento'=>'',
                    'idDepartamentoNacimiento'=>'required',
                    'CiudadNacimiento'=>'max:50',
                    'idRH'=>'required',
                    'Correo'=>'max:100',
                    'Telefono'=>'max:50',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'idProfesion'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'idNivelAcademico'=>'required',
                    'idLocalidad'=>'required',
                    'Barrio'=>'max:50',
                    'idEstado'=>'',
                    'idCargo'=>'',
                    'FechaIngreso'=>'',
                    'FechaRetiro'=>'',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idTipoTercero'=>'required',
                    'idTipoDocumento'=>'required',
                    'NumeroDocumento'=>'required|unique:tercero,idTercero,'.$this->idTercero.',idTercero|max:20',
                    'Nombres'=>'required|max:50',
                    'Apellidos'=>'required|max:50',
                    'FechaNacimiento'=>'',
                    'idDepartamentoNacimiento'=>'required',
                    'CiudadNacimiento'=>'max:50',
                    'idRH'=>'required',
                    'Correo'=>'max:100',
                    'Telefono'=>'max:50',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'idProfesion'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'idNivelAcademico'=>'required',
                    'idLocalidad'=>'required',
                    'Barrio'=>'max:50',
                    'idEstado'=>'',
                    'idCargo'=>'',
                    'FechaIngreso'=>'',
                    'FechaRetiro'=>'',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
