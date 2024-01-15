<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Cargo;
use App\Models\Cargo;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\CargoFormRequest;
use App\Http\Requests\CargoFormRequest;

use DB;

class CargoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $cargos=DB::table('cargo')
            ->paginate(10);
            return view('cargo.index',["cargos"=>$cargos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $cargos=DB::table('cargo')
            ->paginate(1000);
            return view('cargo.report',["cargos"=>$cargos]);
        }
    }
    public function create(){
		
        return view("cargo.create",[]);
    }
    public function store (CargoFormRequest $request){
        $cargo=new Cargo;
        
        $cargo->Cargo=$request->get('Cargo');
        $cargo->save();
        return Redirect::to('cargo');
    }
    public function show($id){
        
        return view("cargo.show",["cargo"=>cargo::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("cargo.edit",["cargo"=>cargo::findOrFail($id),]);
    }
    public function update(CargoFormRequest $request,$id){
        $cargo=Cargo::findOrFail($id);
		
        $cargo->Cargo = $request->get('Cargo');
        $cargo->update();
        return Redirect::to('cargo');
    }
    public function destroy($id){
        $cargo=Cargo::findOrFail($id);
        $cargo->delete();
        return Redirect::to('cargo');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$cargo=Cargo::findOrFail($id);
		//cargo->estado='Inactivo';
        //$cargo->update();
        //return Redirect::to('cargo');
    }
}
