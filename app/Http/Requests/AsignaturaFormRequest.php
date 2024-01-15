<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AsignaturaFormRequest extends Request
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
                    'NombreAsignatura'=>'required|unique:asignatura|max:45',
                    'idCurso'=>'required',
                    'idinstructor'=>'required',
                    'idEstado'=>'required',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'NombreAsignatura'=>'required|unique:asignatura,idAsignatura,'.$this->idAsignatura.',idAsignatura|max:45',
                    'idCurso'=>'required',
                    'idinstructor'=>'required',
                    'idEstado'=>'required',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
