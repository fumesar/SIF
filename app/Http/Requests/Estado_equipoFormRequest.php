<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Estado_equipoFormRequest extends Request
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
                    'EstadoEquipo'=>'required|unique:estado_equipo|max:15',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'EstadoEquipo'=>'required|unique:estado_equipo,idEstadoEquipo,'.$this->idEstadoEquipo.',idEstadoEquipo|max:15',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
