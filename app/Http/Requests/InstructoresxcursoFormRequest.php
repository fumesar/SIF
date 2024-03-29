<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstructoresxcursoFormRequest extends Request
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
                    'idinstructor'=>'required',
                    'idCurso'=>'required',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idinstructor'=>'required',
                    'idCurso'=>'required',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
