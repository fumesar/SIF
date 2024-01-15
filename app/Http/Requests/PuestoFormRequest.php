<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PuestoFormRequest extends Request
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
                    'Puesto'=>'required|unique:puesto|max:45',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Puesto'=>'required|unique:puesto,idPuesto,'.$this->idPuesto.',idPuesto|max:45',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
