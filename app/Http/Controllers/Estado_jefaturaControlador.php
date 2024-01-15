<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Estado_jefatura;
use App\Models\Estado_jefatura;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Estado_jefaturaFormRequest;
use App\Http\Requests\Estado_jefaturaFormRequest;

use DB;

class Estado_jefaturaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $estado_jefaturas=DB::table('estado_jefatura')
            ->paginate(10);
            return view('estado_jefatura.index',["estado_jefaturas"=>$estado_jefaturas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $estado_jefaturas=DB::table('estado_jefatura')
            ->paginate(1000);
            return view('estado_jefatura.report',["estado_jefaturas"=>$estado_jefaturas]);
        }
    }
    public function create(){
		
        return view("estado_jefatura.create",[]);
    }
    public function store (Estado_jefaturaFormRequest $request){
        $estado_jefatura=new Estado_jefatura;
        
        $estado_jefatura->Estado=$request->get('Estado');
        $estado_jefatura->save();
        return Redirect::to('estado_jefatura');
    }
    public function show($id){
        
        return view("estado_jefatura.show",["estado_jefatura"=>estado_jefatura::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("estado_jefatura.edit",["estado_jefatura"=>estado_jefatura::findOrFail($id),]);
    }
    public function update(Estado_jefaturaFormRequest $request,$id){
        $estado_jefatura=Estado_jefatura::findOrFail($id);
		
        $estado_jefatura->Estado = $request->get('Estado');
        $estado_jefatura->update();
        return Redirect::to('estado_jefatura');
    }
    public function destroy($id){
        $estado_jefatura=Estado_jefatura::findOrFail($id);
        $estado_jefatura->delete();
        return Redirect::to('estado_jefatura');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$estado_jefatura=Estado_jefatura::findOrFail($id);
		//estado_jefatura->estado='Inactivo';
        //$estado_jefatura->update();
        //return Redirect::to('estado_jefatura');
    }
}
