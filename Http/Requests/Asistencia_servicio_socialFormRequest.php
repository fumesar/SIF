<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Asistencia_servicio_socialFormRequest extends Request
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
                    'idSeccional'=>'',
                    'idBrigada'=>'',
                    'idPeloton'=>'',
                    'Fecha'=>'required',
                    'idServicioSocial'=>'',
                    'idEstadoAsistencia'=>'',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idSeccional'=>'required',
                    'idBrigada'=>'required',
                    'idPeloton'=>'required',
                    'Fecha'=>'required',
                    'idServicioSocial'=>'required',
                    'idEstadoAsistencia'=>'required',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
