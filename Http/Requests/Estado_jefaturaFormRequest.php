<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Estado_jefaturaFormRequest extends Request
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
                    'Estado'=>'required|unique:estado_jefatura|max:20',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Estado'=>'required|unique:estado_jefatura,idEstado,'.$this->idEstado.',idEstado|max:20',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
