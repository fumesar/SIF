<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnotacionFormRequest extends Request
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
                    'idJefatura'=>'required',
                    'Identificacion'=>'max:20',
                    'Nombres'=>'max:50',
                    'Apellidos'=>'max:50',
                    'idTipoAnotacion'=>'required',
                    'Fecha'=>'required',
                    'Titulo'=>'max:45',
                    'idfalta'=>'required',
                    'Observacion'=>'max:4294967295',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idJefatura'=>'required',
                    'Identificacion'=>'max:20',
                    'Nombres'=>'max:50',
                    'Apellidos'=>'max:50',
                    'idTipoAnotacion'=>'required',
                    'Fecha'=>'required',
                    'Titulo'=>'max:45',
                    'idfalta'=>'required',
                    'Observacion'=>'max:4294967295',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
