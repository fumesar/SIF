<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Servicio_socialFormRequest extends Request
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
                    'Telefono'=>'max:50',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'Correo'=>'max:100',
                    'idLocalidad'=>'required',
                    'Barrio'=>'max:50',
                    'idColegio'=>'required',
                    'idCursoCol'=>'required',
                    'idJornada'=>'required',
                    'Horas'=>'',
                    'idEstado'=>'required',
                    'idSeccional'=>'required',
                    'idBrigada'=>'required',
                    'idPeloton'=>'required',
                    'FechaIngreso'=>'',
                    'FechaFinalizacion'=>'',
                    'idSemestre'=>'required',
                    'Foto'=>'max:1000',
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idTipoDocumento'=>'required',
                    'NumeroDocumento'=>'required|max:20',
                    'Nombres'=>'required|max:50',
                    'Apellidos'=>'required|max:50',
                    'Telefono'=>'max:50',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'Correo'=>'max:100',
                    'idLocalidad'=>'required',
                    'Barrio'=>'max:50',
                    'idColegio'=>'required',
                    'idCursoCol'=>'required',
                    'idJornada'=>'required',
                    'Horas'=>'',
                    'idEstado'=>'required',
                    'idSeccional'=>'required',
                    'idBrigada'=>'required',
                    'idPeloton'=>'required',
                    'FechaIngreso'=>'',
                    'FechaFinalizacion'=>'',
                    'idSemestre'=>'required',
                    'Foto'=>'max:1000',
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
