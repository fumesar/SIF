<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Falta;
use App\Models\Falta;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\FaltaFormRequest;
use App\Http\Requests\FaltaFormRequest;

use DB;

class FaltaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $faltas=DB::table('falta')
            ->paginate(10);
            return view('falta.index',["faltas"=>$faltas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $faltas=DB::table('falta')
            ->paginate(1000);
            return view('falta.report',["faltas"=>$faltas]);
        }
    }
    public function create(){
		
        return view("falta.create",[]);
    }
    public function store (FaltaFormRequest $request){
        $falta=new Falta;
        
        $falta->Falta=$request->get('Falta');
        $falta->save();
        return Redirect::to('falta');
    }
    public function show($id){
        
        return view("falta.show",["falta"=>falta::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("falta.edit",["falta"=>falta::findOrFail($id),]);
    }
    public function update(FaltaFormRequest $request,$id){
        $falta=Falta::findOrFail($id);
		
        $falta->Falta = $request->get('Falta');
        $falta->update();
        return Redirect::to('falta');
    }
    public function destroy($id){
        $falta=Falta::findOrFail($id);
        $falta->delete();
        return Redirect::to('falta');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$falta=Falta::findOrFail($id);
		//falta->estado='Inactivo';
        //$falta->update();
        //return Redirect::to('falta');
    }
}
