<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Colegio;
use App\Models\Colegio;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\ColegioFormRequest;
use App\Http\Requests\ColegioFormRequest;

use DB;

class ColegioControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $colegios=DB::table('colegio')
            ->paginate(10);
            return view('colegio.index',["colegios"=>$colegios,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $colegios=DB::table('colegio')
            ->paginate(1000);
            return view('colegio.report',["colegios"=>$colegios]);
        }
    }
    public function create(){
		
        return view("colegio.create",[]);
    }
    public function store (ColegioFormRequest $request){
        $colegio=new Colegio;
        
        $colegio->Colegio=$request->get('Colegio');
        $colegio->save();
        return Redirect::to('colegio');
    }
    public function show($id){
        
        return view("colegio.show",["colegio"=>colegio::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("colegio.edit",["colegio"=>colegio::findOrFail($id),]);
    }
    public function update(ColegioFormRequest $request,$id){
        $colegio=Colegio::findOrFail($id);
		
        $colegio->Colegio = $request->get('Colegio');
        $colegio->update();
        return Redirect::to('colegio');
    }
    public function destroy($id){
        $colegio=Colegio::findOrFail($id);
        $colegio->delete();
        return Redirect::to('colegio');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$colegio=Colegio::findOrFail($id);
		//colegio->estado='Inactivo';
        //$colegio->update();
        //return Redirect::to('colegio');
    }
}
