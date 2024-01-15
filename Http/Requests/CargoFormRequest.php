<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CargoFormRequest extends Request
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
                    'Cargo'=>'required|unique:cargo|max:50',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Cargo'=>'required|unique:cargo,idCargo,'.$this->idCargo.',idCargo|max:50',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
