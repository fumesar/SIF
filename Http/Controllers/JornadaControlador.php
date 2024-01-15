<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Jornada;
use App\Models\Jornada;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\JornadaFormRequest;
use App\Http\Requests\JornadaFormRequest;

use DB;

class JornadaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $jornadas=DB::table('jornada')
            ->paginate(10);
            return view('jornada.index',["jornadas"=>$jornadas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $jornadas=DB::table('jornada')
            ->paginate(1000);
            return view('jornada.report',["jornadas"=>$jornadas]);
        }
    }
    public function create(){
		
        return view("jornada.create",[]);
    }
    public function store (JornadaFormRequest $request){
        $jornada=new Jornada;
        
        $jornada->Jornada=$request->get('Jornada');
        $jornada->save();
        return Redirect::to('jornada');
    }
    public function show($id){
        
        return view("jornada.show",["jornada"=>jornada::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("jornada.edit",["jornada"=>jornada::findOrFail($id),]);
    }
    public function update(JornadaFormRequest $request,$id){
        $jornada=Jornada::findOrFail($id);
		
        $jornada->Jornada = $request->get('Jornada');
        $jornada->update();
        return Redirect::to('jornada');
    }
    public function destroy($id){
        $jornada=Jornada::findOrFail($id);
        $jornada->delete();
        return Redirect::to('jornada');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$jornada=Jornada::findOrFail($id);
		//jornada->estado='Inactivo';
        //$jornada->update();
        //return Redirect::to('jornada');
    }
}
