<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Tipo_anotacionFormRequest extends Request
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
                    'TipoAnotacion'=>'required|unique:tipo_anotacion|max:20',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'TipoAnotacion'=>'required|unique:tipo_anotacion,idTipoAnotacion,'.$this->idTipoAnotacion.',idTipoAnotacion|max:20',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
