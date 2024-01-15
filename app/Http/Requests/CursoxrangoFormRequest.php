<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CursoxrangoFormRequest extends Request
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
                    'idRango'=>'required',
                    'idCurso'=>'required',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idRango'=>'required',
                    'idCurso'=>'required',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
