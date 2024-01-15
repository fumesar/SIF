<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Tipo_tercero;
use App\Models\Tipo_tercero;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Tipo_terceroFormRequest;
use App\Http\Requests\Tipo_terceroFormRequest;

use DB;

class Tipo_terceroControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $tipo_terceros=DB::table('tipo_tercero')
            ->paginate(10);
            return view('tipo_tercero.index',["tipo_terceros"=>$tipo_terceros,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $tipo_terceros=DB::table('tipo_tercero')
            ->paginate(1000);
            return view('tipo_tercero.report',["tipo_terceros"=>$tipo_terceros]);
        }
    }
    public function create(){
		
        return view("tipo_tercero.create",[]);
    }
    public function store (Tipo_terceroFormRequest $request){
        $tipo_tercero=new Tipo_tercero;
        
        $tipo_tercero->TipoTercero=$request->get('TipoTercero');
        $tipo_tercero->save();
        return Redirect::to('tipo_tercero');
    }
    public function show($id){
        
        return view("tipo_tercero.show",["tipo_tercero"=>tipo_tercero::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("tipo_tercero.edit",["tipo_tercero"=>tipo_tercero::findOrFail($id),]);
    }
    public function update(Tipo_terceroFormRequest $request,$id){
        $tipo_tercero=Tipo_tercero::findOrFail($id);
		
        $tipo_tercero->TipoTercero = $request->get('TipoTercero');
        $tipo_tercero->update();
        return Redirect::to('tipo_tercero');
    }
    public function destroy($id){
        $tipo_tercero=Tipo_tercero::findOrFail($id);
        $tipo_tercero->delete();
        return Redirect::to('tipo_tercero');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$tipo_tercero=Tipo_tercero::findOrFail($id);
		//tipo_tercero->estado='Inactivo';
        //$tipo_tercero->update();
        //return Redirect::to('tipo_tercero');
    }
}
