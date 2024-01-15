<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Localidad;
use App\Models\Localidad;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\LocalidadFormRequest;
use App\Http\Requests\LocalidadFormRequest;

use DB;

class LocalidadControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $localidads=DB::table('localidad')
            ->paginate(10);
            return view('localidad.index',["localidads"=>$localidads,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $localidads=DB::table('localidad')
            ->paginate(1000);
            return view('localidad.report',["localidads"=>$localidads]);
        }
    }
    public function create(){
		
        return view("localidad.create",[]);
    }
    public function store (LocalidadFormRequest $request){
        $localidad=new Localidad;
        
        $localidad->Localidad=$request->get('Localidad');
        $localidad->save();
        return Redirect::to('localidad');
    }
    public function show($id){
        
        return view("localidad.show",["localidad"=>localidad::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("localidad.edit",["localidad"=>localidad::findOrFail($id),]);
    }
    public function update(LocalidadFormRequest $request,$id){
        $localidad=Localidad::findOrFail($id);
		
        $localidad->Localidad = $request->get('Localidad');
        $localidad->update();
        return Redirect::to('localidad');
    }
    public function destroy($id){
        $localidad=Localidad::findOrFail($id);
        $localidad->delete();
        return Redirect::to('localidad');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$localidad=Localidad::findOrFail($id);
		//localidad->estado='Inactivo';
        //$localidad->update();
        //return Redirect::to('localidad');
    }
}
