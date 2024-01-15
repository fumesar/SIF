<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TablasFormRequest extends Request
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
                    'NombreTabla'=>'required|max:50',
                    'Tipo'=>'max:50',
                    'Opcion'=>'max:45',
                    'Grupo'=>'max:45',
                    'Orden'=>'',
                    'Icono'=>'max:45',
                    'IconoGrupo'=>'max:45',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'NombreTabla'=>'required|max:50',
                    'Tipo'=>'max:50',
                    'Opcion'=>'max:45',
                    'Grupo'=>'max:45',
                    'Orden'=>'',
                    'Icono'=>'max:45',
                    'IconoGrupo'=>'max:45',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
