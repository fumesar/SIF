<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Nivelacademico;
use App\Models\Nivelacademico;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\NivelacademicoFormRequest;
use App\Http\Requests\NivelacademicoFormRequest;

use DB;

class NivelacademicoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $nivelacademicos=DB::table('nivelacademico')
            ->paginate(10);
            return view('nivelacademico.index',["nivelacademicos"=>$nivelacademicos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $nivelacademicos=DB::table('nivelacademico')
            ->paginate(1000);
            return view('nivelacademico.report',["nivelacademicos"=>$nivelacademicos]);
        }
    }
    public function create(){
		
        return view("nivelacademico.create",[]);
    }
    public function store (NivelacademicoFormRequest $request){
        $nivelacademico=new Nivelacademico;
        
        $nivelacademico->NivelAcademico=$request->get('NivelAcademico');
        $nivelacademico->save();
        return Redirect::to('nivelacademico');
    }
    public function show($id){
        return view("nivelacademico.show",["nivelacademico"=>nivelacademico::findOrFail($id)]);
    }
    public function edit($id){
        
        return view("nivelacademico.edit",["nivelacademico"=>nivelacademico::findOrFail($id),]);
    }
    public function update(NivelacademicoFormRequest $request,$id){
        $nivelacademico=Nivelacademico::findOrFail($id);
		
        $nivelacademico->NivelAcademico=$request->get('NivelAcademico');
        $nivelacademico->update();
        return Redirect::to('nivelacademico');
    }
    public function destroy($id){
        $nivelacademico=Nivelacademico::findOrFail($id);
        $nivelacademico->delete();
        return Redirect::to('nivelacademico');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$nivelacademico=Nivelacademico::findOrFail($id);
		//nivelacademico->estado='Inactivo';
        //$nivelacademico->update();
        //return Redirect::to('nivelacademico');
    }
}
