<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Departamento_residencia;
use App\Models\Departamento_residencia;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Departamento_residenciaFormRequest;
use App\Http\Requests\Departamento_residenciaFormRequest;

use DB;

class Departamento_residenciaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $departamento_residencias=DB::table('departamento_residencia')
            ->paginate(10);
            return view('departamento_residencia.index',["departamento_residencias"=>$departamento_residencias,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $departamento_residencias=DB::table('departamento_residencia')
            ->paginate(1000);
            return view('departamento_residencia.report',["departamento_residencias"=>$departamento_residencias]);
        }
    }
    public function create(){
		
        return view("departamento_residencia.create",[]);
    }
    public function store (Departamento_residenciaFormRequest $request){
        $departamento_residencia=new Departamento_residencia;
        
        $departamento_residencia->DepartamentoResidencia=$request->get('DepartamentoResidencia');
        $departamento_residencia->save();
        return Redirect::to('departamento_residencia');
    }
    public function show($id){
        
        return view("departamento_residencia.show",["departamento_residencia"=>departamento_residencia::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("departamento_residencia.edit",["departamento_residencia"=>departamento_residencia::findOrFail($id),]);
    }
    public function update(Departamento_residenciaFormRequest $request,$id){
        $departamento_residencia=Departamento_residencia::findOrFail($id);
		
        $departamento_residencia->DepartamentoResidencia = $request->get('DepartamentoResidencia');
        $departamento_residencia->update();
        return Redirect::to('departamento_residencia');
    }
    public function destroy($id){
        $departamento_residencia=Departamento_residencia::findOrFail($id);
        $departamento_residencia->delete();
        return Redirect::to('departamento_residencia');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$departamento_residencia=Departamento_residencia::findOrFail($id);
		//departamento_residencia->estado='Inactivo';
        //$departamento_residencia->update();
        //return Redirect::to('departamento_residencia');
    }
}
