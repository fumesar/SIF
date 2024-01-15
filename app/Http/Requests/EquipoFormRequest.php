<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EquipoFormRequest extends Request
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
                    
                    'NombreEquipo'=>'required|unique:equipo|max:50',
                    'Referencia'=>'max:100',
                    'Cantidad'=>'required',
                    'NroEstante'=>'max:45',
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'NombreEquipo'=>'required|unique:equipo,idEquipo,'.$this->idEquipo.',idEquipo|max:50',
                    'Referencia'=>'max:100',
                    'Cantidad'=>'required',
                    'NroEstante'=>'max:45',

                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
