<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Estado_asistenciaFormRequest extends Request
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
                    'EstadoAsistencia'=>'required|unique:estado_asistencia|max:45',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'EstadoAsistencia'=>'required|unique:estado_asistencia,idEstadoAsistencia,'.$this->idEstadoAsistencia.',idEstadoAsistencia|max:45',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
