<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FaltaFormRequest extends Request
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
                    'Falta'=>'required|unique:falta|max:50',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Falta'=>'required|unique:falta,idfalta,'.$this->idfalta.',idfalta|max:50',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
