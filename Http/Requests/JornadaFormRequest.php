<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JornadaFormRequest extends Request
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
                    'Jornada'=>'required|unique:jornada|max:20',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Jornada'=>'required|unique:jornada,idJornada,'.$this->idJornada.',idJornada|max:20',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
