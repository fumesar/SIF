<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Departamento_nacimientoFormRequest extends Request
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
                    'DepartamentoNacimiento'=>'required|unique:departamento_nacimiento|max:30',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'DepartamentoNacimiento'=>'required|unique:departamento_nacimiento,idDepartamentoNacimiento,'.$this->idDepartamentoNacimiento.',idDepartamentoNacimiento|max:30',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
