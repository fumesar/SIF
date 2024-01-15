<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CalificacionFormRequest extends Request
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
                    'idSemestre'=>'required',
                    'idCurso'=>'required',
                    'idAsignatura'=>'required',
                    'idJefatura'=>'',
                    'Nota'=>'',
                    'Promedio'=>'',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idSemestre'=>'required',
                    'idCurso'=>'required',
                    'idAsignatura'=>'required',
                    'idJefatura'=>'',
                    'Nota'=>'',
                    'Promedio'=>'',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
