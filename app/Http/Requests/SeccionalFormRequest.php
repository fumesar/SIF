<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SeccionalFormRequest extends Request
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
                    'Seccional'=>'required|unique:seccional|max:30',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Seccional'=>'required|unique:seccional,idSeccional,'.$this->idSeccional.',idSeccional|max:30',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
