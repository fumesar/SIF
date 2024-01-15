<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Curso_colegio;
use App\Models\Curso_colegio;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Curso_colegioFormRequest;
use App\Http\Requests\Curso_colegioFormRequest;

use DB;

class Curso_colegioControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $curso_colegios=DB::table('curso_colegio')
            ->paginate(10);
            return view('curso_colegio.index',["curso_colegios"=>$curso_colegios,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $curso_colegios=DB::table('curso_colegio')
            ->paginate(1000);
            return view('curso_colegio.report',["curso_colegios"=>$curso_colegios]);
        }
    }
    public function create(){
		
        return view("curso_colegio.create",[]);
    }
    public function store (Curso_colegioFormRequest $request){
        $curso_colegio=new Curso_colegio;
        
        $curso_colegio->Curso=$request->get('Curso');
        $curso_colegio->save();
        return Redirect::to('curso_colegio');
    }
    public function show($id){
        
        return view("curso_colegio.show",["curso_colegio"=>curso_colegio::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("curso_colegio.edit",["curso_colegio"=>curso_colegio::findOrFail($id),]);
    }
    public function update(Curso_colegioFormRequest $request,$id){
        $curso_colegio=Curso_colegio::findOrFail($id);
		
        $curso_colegio->Curso = $request->get('Curso');
        $curso_colegio->update();
        return Redirect::to('curso_colegio');
    }
    public function destroy($id){
        $curso_colegio=Curso_colegio::findOrFail($id);
        $curso_colegio->delete();
        return Redirect::to('curso_colegio');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$curso_colegio=Curso_colegio::findOrFail($id);
		//curso_colegio->estado='Inactivo';
        //$curso_colegio->update();
        //return Redirect::to('curso_colegio');
    }
}
