<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Nivel_academico;
use App\Models\Nivel_academico;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Nivel_academicoFormRequest;
use App\Http\Requests\Nivel_academicoFormRequest;

use DB;

class Nivel_academicoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $nivel_academicos=DB::table('nivel_academico')
            ->paginate(10);
            return view('nivel_academico.index',["nivel_academicos"=>$nivel_academicos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $nivel_academicos=DB::table('nivel_academico')
            ->paginate(1000);
            return view('nivel_academico.report',["nivel_academicos"=>$nivel_academicos]);
        }
    }
    public function create(){
		
        return view("nivel_academico.create",[]);
    }
    public function store (Nivel_academicoFormRequest $request){
        $nivel_academico=new Nivel_academico;
        
        $nivel_academico->NivelAcademico=$request->get('NivelAcademico');
        $nivel_academico->save();
        return Redirect::to('nivel_academico');
    }
    public function show($id){
        
        return view("nivel_academico.show",["nivel_academico"=>nivel_academico::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("nivel_academico.edit",["nivel_academico"=>nivel_academico::findOrFail($id),]);
    }
    public function update(Nivel_academicoFormRequest $request,$id){
        $nivel_academico=Nivel_academico::findOrFail($id);
		
        $nivel_academico->NivelAcademico = $request->get('NivelAcademico');
        $nivel_academico->update();
        return Redirect::to('nivel_academico');
    }
    public function destroy($id){
        $nivel_academico=Nivel_academico::findOrFail($id);
        $nivel_academico->delete();
        return Redirect::to('nivel_academico');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$nivel_academico=Nivel_academico::findOrFail($id);
		//nivel_academico->estado='Inactivo';
        //$nivel_academico->update();
        //return Redirect::to('nivel_academico');
    }
}
