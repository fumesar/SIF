<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProveedorFormRequest extends Request
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
                    'idTipoDocumento'=>'required',
                    'NumeroDocumento'=>'required|unique:proveedor|max:20',
                    'Nombres'=>'max:50',
                    'Apellidos'=>'max:50',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'Telefono'=>'max:20',
                    'Celular'=>'max:20',
                    'PersonaContacto'=>'max:45',
                    'PaginaWeb'=>'max:100',
                    'Correo'=>'max:50',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'idTipoDocumento'=>'required',
                    'NumeroDocumento'=>'required|unique:proveedor,idProveedor,'.$this->idProveedor.',idProveedor|max:20',
                    'Nombres'=>'max:50',
                    'Apellidos'=>'max:50',
                    'Direccion'=>'max:100',
                    'idDepartamentoResidencia'=>'required',
                    'CiudadResidencia'=>'max:50',
                    'Telefono'=>'max:20',
                    'Celular'=>'max:20',
                    'PersonaContacto'=>'max:45',
                    'PaginaWeb'=>'max:100',
                    'Correo'=>'max:50',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
