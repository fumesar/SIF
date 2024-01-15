<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstructorFormRequest extends Request
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
                    'Documento'=>'required|unique:instructor|max:20',
                    'Nombres'=>'unique:instructor|max:50',
                    'Apellidos'=>'unique:instructor|max:50',
                    'Correo'=>'max:100',
                    'Telefono'=>'max:50',
                    'idEstado'=>'required',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Documento'=>'required|unique:instructor,idinstructor,'.$this->idinstructor.',idinstructor|max:20',
                    'Nombres'=>'unique:instructor,idinstructor,'.$this->idinstructor.',idinstructor|max:50',
                    'Apellidos'=>'unique:instructor,idinstructor,'.$this->idinstructor.',idinstructor|max:50',
                    'Correo'=>'max:100',
                    'Telefono'=>'max:50',
                    'idEstado'=>'required',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
