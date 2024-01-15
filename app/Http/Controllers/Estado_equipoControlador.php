<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Estado_equipo;
use App\Models\Estado_equipo;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Estado_equipoFormRequest;
use App\Http\Requests\Estado_equipoFormRequest;

use DB;

class Estado_equipoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $estado_equipos=DB::table('estado_equipo')
            ->paginate(10);
            return view('estado_equipo.index',["estado_equipos"=>$estado_equipos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $estado_equipos=DB::table('estado_equipo')
            ->paginate(1000);
            return view('estado_equipo.report',["estado_equipos"=>$estado_equipos]);
        }
    }
    public function create(){
		
        return view("estado_equipo.create",[]);
    }
    public function store (Estado_equipoFormRequest $request){
        $estado_equipo=new Estado_equipo;
        
        $estado_equipo->idEstadoEquipo=$request->get('idEstadoEquipo');
        $estado_equipo->EstadoEquipo=$request->get('EstadoEquipo');
        $estado_equipo->save();
        return Redirect::to('estado_equipo');
    }
    public function show($id){
        
        return view("estado_equipo.show",["estado_equipo"=>estado_equipo::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("estado_equipo.edit",["estado_equipo"=>estado_equipo::findOrFail($id),]);
    }
    public function update(Estado_equipoFormRequest $request,$id){
        $estado_equipo=Estado_equipo::findOrFail($id);
		
        $estado_equipo->idEstadoEquipo = $request->get('idEstadoEquipo');
        $estado_equipo->EstadoEquipo = $request->get('EstadoEquipo');
        $estado_equipo->update();
        return Redirect::to('estado_equipo');
    }
    public function destroy($id){
        $estado_equipo=Estado_equipo::findOrFail($id);
        $estado_equipo->delete();
        return Redirect::to('estado_equipo');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$estado_equipo=Estado_equipo::findOrFail($id);
		//estado_equipo->estado='Inactivo';
        //$estado_equipo->update();
        //return Redirect::to('estado_equipo');
    }
}
