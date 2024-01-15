<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Tipo_anotacion;
use App\Models\Tipo_anotacion;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Tipo_anotacionFormRequest;
use App\Http\Requests\Tipo_anotacionFormRequest;

use DB;

class Tipo_anotacionControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $tipo_anotacions=DB::table('tipo_anotacion')
            ->paginate(10);
            return view('tipo_anotacion.index',["tipo_anotacions"=>$tipo_anotacions,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $tipo_anotacions=DB::table('tipo_anotacion')
            ->paginate(1000);
            return view('tipo_anotacion.report',["tipo_anotacions"=>$tipo_anotacions]);
        }
    }
    public function create(){
		
        return view("tipo_anotacion.create",[]);
    }
    public function store (Tipo_anotacionFormRequest $request){
        $tipo_anotacion=new Tipo_anotacion;
        
        $tipo_anotacion->TipoAnotacion=$request->get('TipoAnotacion');
        $tipo_anotacion->save();
        return Redirect::to('tipo_anotacion');
    }
    public function show($id){
        
        return view("tipo_anotacion.show",["tipo_anotacion"=>tipo_anotacion::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("tipo_anotacion.edit",["tipo_anotacion"=>tipo_anotacion::findOrFail($id),]);
    }
    public function update(Tipo_anotacionFormRequest $request,$id){
        $tipo_anotacion=Tipo_anotacion::findOrFail($id);
		
        $tipo_anotacion->TipoAnotacion = $request->get('TipoAnotacion');
        $tipo_anotacion->update();
        return Redirect::to('tipo_anotacion');
    }
    public function destroy($id){
        $tipo_anotacion=Tipo_anotacion::findOrFail($id);
        $tipo_anotacion->delete();
        return Redirect::to('tipo_anotacion');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$tipo_anotacion=Tipo_anotacion::findOrFail($id);
		//tipo_anotacion->estado='Inactivo';
        //$tipo_anotacion->update();
        //return Redirect::to('tipo_anotacion');
    }
}
