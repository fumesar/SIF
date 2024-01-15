<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatricularFormRequest extends Request
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
                    'Documento'=>'max:20',
                    'Nombres'=>'max:50',
                    'Apellidos'=>'max:50',
                    'idCurso'=>'required',
                    'idEstadoMatricula'=>'required',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idSemestre'=>'required',
                    'Documento'=>'max:20',
                    'Nombres'=>'max:50',
                    'Apellidos'=>'max:50',
                    'idCurso'=>'required',
                    'idEstadoMatricula'=>'required',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
