<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Tipo_documentoFormRequest extends Request
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
                    'TipoDocumento'=>'required|unique:tipo_documento|max:45',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'TipoDocumento'=>'required|unique:tipo_documento,idTipoDocumento,'.$this->idTipoDocumento.',idTipoDocumento|max:45',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
