<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Profesion;
use App\Models\Profesion;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\ProfesionFormRequest;
use App\Http\Requests\ProfesionFormRequest;

use DB;

class ProfesionControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $profesions=DB::table('profesion')
            ->paginate(10);
            return view('profesion.index',["profesions"=>$profesions,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $profesions=DB::table('profesion')
            ->paginate(1000);
            return view('profesion.report',["profesions"=>$profesions]);
        }
    }
    public function create(){
		
        return view("profesion.create",[]);
    }
    public function store (ProfesionFormRequest $request){
        $profesion=new Profesion;
        
        $profesion->Profesion=$request->get('Profesion');
        $profesion->save();
        return Redirect::to('profesion');
    }
    public function show($id){
        
        return view("profesion.show",["profesion"=>profesion::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("profesion.edit",["profesion"=>profesion::findOrFail($id),]);
    }
    public function update(ProfesionFormRequest $request,$id){
        $profesion=Profesion::findOrFail($id);
		
        $profesion->Profesion = $request->get('Profesion');
        $profesion->update();
        return Redirect::to('profesion');
    }
    public function destroy($id){
        $profesion=Profesion::findOrFail($id);
        $profesion->delete();
        return Redirect::to('profesion');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$profesion=Profesion::findOrFail($id);
		//profesion->estado='Inactivo';
        //$profesion->update();
        //return Redirect::to('profesion');
    }
}
