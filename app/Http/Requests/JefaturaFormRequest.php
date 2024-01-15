<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JefaturaFormRequest extends Request
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
                    'idTipoDocumento'=>'required',
                    'NumeroDocumento'=>'required|max:20',
                    'Nombres'=>'required|max:50',
                    'Apellidos'=>'required|max:50',
                    'FechaNacimiento'=>'',
                    'idDepartamentoNacimiento'=>'required',
                    'CiudadNacimiento'=>'max:50',
                    'idRH'=>'required',
                    'Correo'=>'max:100',
                    'Telefono'=>'max:50',
                    'idNivelAcademico'=>'required',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'idLocalidad'=>'required',
                    'Barrio'=>'max:50',
                    'idEstado'=>'required',
                    'idRango'=>'required',
                    'idCargo'=>'required',
                    'idSeccional'=>'required',
                    'idBrigada'=>'required',
                    'idPeloton'=>'required',
                    'FechaIngreso'=>'',
                    'idPuesto'=>'required',
                    'Antiguedad'=>'max:30',
                    'FechaAscenso'=>'',
                    'FechaRetiro'=>'',
                    'Foto'=>'max:1000',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idTipoDocumento'=>'required',
                    'NumeroDocumento'=>'required|max:20',
                    'Nombres'=>'required|max:50',
                    'Apellidos'=>'required|max:50',
                    'FechaNacimiento'=>'',
                    'idDepartamentoNacimiento'=>'required',
                    'CiudadNacimiento'=>'max:50',
                    'idRH'=>'required',
                    'Correo'=>'max:100',
                    'Telefono'=>'max:50',
                    'idNivelAcademico'=>'required',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'idLocalidad'=>'required',
                    'Barrio'=>'max:50',
                    'idEstado'=>'required',
                    'idRango'=>'',
                    'idCargo'=>'required',
                    'idSeccional'=>'required',
                    'idBrigada'=>'required',
                    'idPeloton'=>'required',
                    'FechaIngreso'=>'',
                    'idPuesto'=>'required',
                    'Antiguedad'=>'max:30',
                    'FechaAscenso'=>'',
                    'FechaRetiro'=>'',
                    'Foto'=>'max:1000',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
