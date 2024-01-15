<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Curso_colegioFormRequest extends Request
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
                    'Curso'=>'required|unique:curso_colegio|max:45',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Curso'=>'required|unique:curso_colegio,idCursoCol,'.$this->idCursoCol.',idCursoCol|max:45',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
