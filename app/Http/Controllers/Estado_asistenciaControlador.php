<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Estado_asistencia;
use App\Models\Estado_asistencia;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Estado_asistenciaFormRequest;
use App\Http\Requests\Estado_asistenciaFormRequest;

use DB;

class Estado_asistenciaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $estado_asistencias=DB::table('estado_asistencia')
            ->paginate(10);
            return view('estado_asistencia.index',["estado_asistencias"=>$estado_asistencias,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $estado_asistencias=DB::table('estado_asistencia')
            ->paginate(1000);
            return view('estado_asistencia.report',["estado_asistencias"=>$estado_asistencias]);
        }
    }
    public function create(){
		
        return view("estado_asistencia.create",[]);
    }
    public function store (Estado_asistenciaFormRequest $request){
        $estado_asistencia=new Estado_asistencia;
        
        $estado_asistencia->EstadoAsistencia=$request->get('EstadoAsistencia');
        $estado_asistencia->save();
        return Redirect::to('estado_asistencia');
    }
    public function show($id){
        
        return view("estado_asistencia.show",["estado_asistencia"=>estado_asistencia::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("estado_asistencia.edit",["estado_asistencia"=>estado_asistencia::findOrFail($id),]);
    }
    public function update(Estado_asistenciaFormRequest $request,$id){
        $estado_asistencia=Estado_asistencia::findOrFail($id);
		
        $estado_asistencia->EstadoAsistencia = $request->get('EstadoAsistencia');
        $estado_asistencia->update();
        return Redirect::to('estado_asistencia');
    }
    public function destroy($id){
        $estado_asistencia=Estado_asistencia::findOrFail($id);
        $estado_asistencia->delete();
        return Redirect::to('estado_asistencia');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$estado_asistencia=Estado_asistencia::findOrFail($id);
		//estado_asistencia->estado='Inactivo';
        //$estado_asistencia->update();
        //return Redirect::to('estado_asistencia');
    }
}
