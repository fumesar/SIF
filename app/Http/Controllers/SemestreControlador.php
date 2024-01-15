<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Semestre;
use App\Models\Semestre;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\SemestreFormRequest;
use App\Http\Requests\SemestreFormRequest;

use DB;

class SemestreControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $semestres=DB::table('semestre')
            ->paginate(10);
            return view('semestre.index',["semestres"=>$semestres,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $semestres=DB::table('semestre')
            ->paginate(1000);
            return view('semestre.report',["semestres"=>$semestres]);
        }
    }
    public function create(){
		
        return view("semestre.create",[]);
    }
    public function store (SemestreFormRequest $request){
        $semestre=new Semestre;
        
        $semestre->Semestre=$request->get('Semestre');
        $semestre->FechaInicio=$request->get('FechaInicio');
        $semestre->FechaFinal=$request->get('FechaFinal');
        $semestre->save();
        return Redirect::to('semestre');
    }
    public function show($id){
        
        return view("semestre.show",["semestre"=>semestre::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("semestre.edit",["semestre"=>semestre::findOrFail($id),]);
    }
    public function update(SemestreFormRequest $request,$id){
        $semestre=Semestre::findOrFail($id);
		
        $semestre->Semestre = $request->get('Semestre');
        $semestre->FechaInicio = $request->get('FechaInicio');
        $semestre->FechaFinal = $request->get('FechaFinal');
        $semestre->update();
        return Redirect::to('semestre');
    }
    public function destroy($id){
        $semestre=Semestre::findOrFail($id);
        $semestre->delete();
        return Redirect::to('semestre');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$semestre=Semestre::findOrFail($id);
		//semestre->estado='Inactivo';
        //$semestre->update();
        //return Redirect::to('semestre');
    }
}
