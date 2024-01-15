<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Estado;
use App\Models\Estado;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\EstadoFormRequest;
use App\Http\Requests\EstadoFormRequest;

use DB;

class EstadoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $estados=DB::table('estado')
            ->paginate(10);
            return view('estado.index',["estados"=>$estados,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $estados=DB::table('estado')
            ->paginate(1000);
            return view('estado.report',["estados"=>$estados]);
        }
    }
    public function create(){
		
        return view("estado.create",[]);
    }
    public function store (EstadoFormRequest $request){
        $estado=new Estado;
        
        $estado->Estado=$request->get('Estado');
        $estado->save();
        return Redirect::to('estado');
    }
    public function show($id){
        
        return view("estado.show",["estado"=>estado::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("estado.edit",["estado"=>estado::findOrFail($id),]);
    }
    public function update(EstadoFormRequest $request,$id){
        $estado=Estado::findOrFail($id);
		
        $estado->Estado = $request->get('Estado');
        $estado->update();
        return Redirect::to('estado');
    }
    public function destroy($id){
        $estado=Estado::findOrFail($id);
        $estado->delete();
        return Redirect::to('estado');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$estado=Estado::findOrFail($id);
		//estado->estado='Inactivo';
        //$estado->update();
        //return Redirect::to('estado');
    }
}
