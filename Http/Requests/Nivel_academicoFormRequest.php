<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Nivel_academicoFormRequest extends Request
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
                    'NivelAcademico'=>'required|unique:nivel_academico|max:45',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'NivelAcademico'=>'required|unique:nivel_academico,idNivelAcademico,'.$this->idNivelAcademico.',idNivelAcademico|max:45',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
