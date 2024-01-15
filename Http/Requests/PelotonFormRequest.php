<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PelotonFormRequest extends Request
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
                    'Peloton'=>'required|unique:peloton|max:20',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'Peloton'=>'required|unique:peloton,idPeloton,'.$this->idPeloton.',idPeloton|max:20',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
