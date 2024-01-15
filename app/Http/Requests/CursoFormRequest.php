<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CursoFormRequest extends Request
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
                    'NombreCurso'=>'required|unique:curso,NombreCurso,NULL,idSemestre,idSemestre,'.$this->idSemestre.'|max:100',
                    'idEstado'=>'required',
                    
                ];
                break;                
            case 'PATCH':   //edicion
                $rules = [
                    'NombreCurso'=>'required|unique:curso,NombreCurso,NULL,idSemestre,idSemestre,'.$this->idSemestre.'|max:100',
                    //'NombreCurso'=>'required|unique:curso,idCurso,'.$this->idCurso.',idCurso|max:100',
                    'idEstado'=>'required',
                    
                ];
                break;
            case 'DELETE':
            default:
               
        }

        return $rules;



    }
}
