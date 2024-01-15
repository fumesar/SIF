<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Tablas;
use App\Models\Tablas;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\TablasFormRequest;
use App\Http\Requests\TablasFormRequest;

use DB;

class TablasControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $tablass=DB::table('tablas')
            ->paginate(10);
            return view('tablas.index',["tablass"=>$tablass,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $tablass=DB::table('tablas')
            ->paginate(1000);
            return view('tablas.report',["tablass"=>$tablass]);
        }
    }
    public function create(){
		
        return view("tablas.create",[]);
    }
    public function store (TablasFormRequest $request){
        $tablas=new Tablas;
        
        $tablas->NombreTabla=$request->get('NombreTabla');
        $tablas->Tipo=$request->get('Tipo');
        $tablas->Opcion=$request->get('Opcion');
        $tablas->Grupo=$request->get('Grupo');
        $tablas->Orden=$request->get('Orden');
        $tablas->Icono=$request->get('Icono');
        $tablas->IconoGrupo=$request->get('IconoGrupo');
        $tablas->save();
        return Redirect::to('tablas');
    }
    public function show($id){
        
        return view("tablas.show",["tablas"=>tablas::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("tablas.edit",["tablas"=>tablas::findOrFail($id),]);
    }
    public function update(TablasFormRequest $request,$id){
        $tablas=Tablas::findOrFail($id);
		
        $tablas->NombreTabla = $request->get('NombreTabla');
        $tablas->Tipo = $request->get('Tipo');
        $tablas->Opcion = $request->get('Opcion');
        $tablas->Grupo = $request->get('Grupo');
        $tablas->Orden = $request->get('Orden');
        $tablas->Icono = $request->get('Icono');
        $tablas->IconoGrupo = $request->get('IconoGrupo');
        $tablas->update();
        return Redirect::to('tablas');
    }
    public function destroy($id){
        $tablas=Tablas::findOrFail($id);
        $tablas->delete();
        return Redirect::to('tablas');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$tablas=Tablas::findOrFail($id);
		//tablas->estado='Inactivo';
        //$tablas->update();
        //return Redirect::to('tablas');
    }
}
