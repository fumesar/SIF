<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BrigadaFormRequest extends Request
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
                    'Brigada'=>'required|unique:brigada|max:10',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Brigada'=>'required|unique:brigada,idBrigada,'.$this->idBrigada.',idBrigada|max:10',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
