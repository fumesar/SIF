<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SemestreFormRequest extends Request
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
                    'Semestre'=>'required|unique:semestre|max:10',
                    'FechaInicio'=>'',
                    'FechaFinal'=>'',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Semestre'=>'required|unique:semestre,idSemestre,'.$this->idSemestre.',idSemestre|max:10',
                    'FechaInicio'=>'',
                    'FechaFinal'=>'',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
