<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ColegioFormRequest extends Request
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
                    'Colegio'=>'required|unique:colegio|max:100',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Colegio'=>'required|unique:colegio,idColegio,'.$this->idColegio.',idColegio|max:100',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
