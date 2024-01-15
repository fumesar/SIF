<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Estado_matricula;
use App\Models\Estado_matricula;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Estado_matriculaFormRequest;
use App\Http\Requests\Estado_matriculaFormRequest;

use DB;

class Estado_matriculaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $estado_matriculas=DB::table('estado_matricula')
            ->paginate(10);
            return view('estado_matricula.index',["estado_matriculas"=>$estado_matriculas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $estado_matriculas=DB::table('estado_matricula')
            ->paginate(1000);
            return view('estado_matricula.report',["estado_matriculas"=>$estado_matriculas]);
        }
    }
    public function create(){
		
        return view("estado_matricula.create",[]);
    }
    public function store (Estado_matriculaFormRequest $request){
        $estado_matricula=new Estado_matricula;
        
        $estado_matricula->EstadoMatricula=$request->get('EstadoMatricula');
        $estado_matricula->save();
        return Redirect::to('estado_matricula');
    }
    public function show($id){
        
        return view("estado_matricula.show",["estado_matricula"=>estado_matricula::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("estado_matricula.edit",["estado_matricula"=>estado_matricula::findOrFail($id),]);
    }
    public function update(Estado_matriculaFormRequest $request,$id){
        $estado_matricula=Estado_matricula::findOrFail($id);
		
        $estado_matricula->EstadoMatricula = $request->get('EstadoMatricula');
        $estado_matricula->update();
        return Redirect::to('estado_matricula');
    }
    public function destroy($id){
        $estado_matricula=Estado_matricula::findOrFail($id);
        $estado_matricula->delete();
        return Redirect::to('estado_matricula');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$estado_matricula=Estado_matricula::findOrFail($id);
		//estado_matricula->estado='Inactivo';
        //$estado_matricula->update();
        //return Redirect::to('estado_matricula');
    }
}
