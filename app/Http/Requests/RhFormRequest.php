<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RhFormRequest extends Request
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
                    'RH'=>'required|unique:rh|max:10',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'RH'=>'required|unique:rh,idRH,'.$this->idRH.',idRH|max:10',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
