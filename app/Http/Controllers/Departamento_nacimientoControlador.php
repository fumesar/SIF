<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Departamento_nacimiento;
use App\Models\Departamento_nacimiento;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Departamento_nacimientoFormRequest;
use App\Http\Requests\Departamento_nacimientoFormRequest;

use DB;

class Departamento_nacimientoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $departamento_nacimientos=DB::table('departamento_nacimiento')
            ->paginate(10);
            return view('departamento_nacimiento.index',["departamento_nacimientos"=>$departamento_nacimientos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $departamento_nacimientos=DB::table('departamento_nacimiento')
            ->paginate(1000);
            return view('departamento_nacimiento.report',["departamento_nacimientos"=>$departamento_nacimientos]);
        }
    }
    public function create(){
		
        return view("departamento_nacimiento.create",[]);
    }
    public function store (Departamento_nacimientoFormRequest $request){
        $departamento_nacimiento=new Departamento_nacimiento;
        
        $departamento_nacimiento->DepartamentoNacimiento=$request->get('DepartamentoNacimiento');
        $departamento_nacimiento->save();
        return Redirect::to('departamento_nacimiento');
    }
    public function show($id){
        
        return view("departamento_nacimiento.show",["departamento_nacimiento"=>departamento_nacimiento::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("departamento_nacimiento.edit",["departamento_nacimiento"=>departamento_nacimiento::findOrFail($id),]);
    }
    public function update(Departamento_nacimientoFormRequest $request,$id){
        $departamento_nacimiento=Departamento_nacimiento::findOrFail($id);
		
        $departamento_nacimiento->DepartamentoNacimiento = $request->get('DepartamentoNacimiento');
        $departamento_nacimiento->update();
        return Redirect::to('departamento_nacimiento');
    }
    public function destroy($id){
        $departamento_nacimiento=Departamento_nacimiento::findOrFail($id);
        $departamento_nacimiento->delete();
        return Redirect::to('departamento_nacimiento');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$departamento_nacimiento=Departamento_nacimiento::findOrFail($id);
		//departamento_nacimiento->estado='Inactivo';
        //$departamento_nacimiento->update();
        //return Redirect::to('departamento_nacimiento');
    }
}
