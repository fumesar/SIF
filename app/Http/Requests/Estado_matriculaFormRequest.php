<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Estado_matriculaFormRequest extends Request
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
                    'EstadoMatricula'=>'required|unique:estado_matricula|max:20',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'EstadoMatricula'=>'required|unique:estado_matricula,idEstadoMatricula,'.$this->idEstadoMatricula.',idEstadoMatricula|max:20',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
