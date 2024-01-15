<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Prestamo_equipoFormRequest extends Request
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
                    'NroDocumento'=>'required|max:20',
                    'idEquipo'=>'required',
                    'Referencia'=>'max:50',
                    'FechaVencimiento'=>'required',
                    'Nota'=>'max:100',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'NroDocumento'=>'required|max:20',
                    'idEquipo'=>'required',
                    'Referencia'=>'max:50',
                    'FechaVencimiento'=>'required',
                    'Nota'=>'max:100',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
