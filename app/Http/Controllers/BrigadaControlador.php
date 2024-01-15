<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Brigada;
use App\Models\Brigada;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\BrigadaFormRequest;
use App\Http\Requests\BrigadaFormRequest;

use DB;

class BrigadaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $brigadas=DB::table('brigada')
            ->paginate(10);
            return view('brigada.index',["brigadas"=>$brigadas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $brigadas=DB::table('brigada')
            ->paginate(1000);
            return view('brigada.report',["brigadas"=>$brigadas]);
        }
    }
    public function create(){
		
        return view("brigada.create",[]);
    }
    public function store (BrigadaFormRequest $request){
        $brigada=new Brigada;
        
        $brigada->Brigada=$request->get('Brigada');
        $brigada->save();
        return Redirect::to('brigada');
    }
    public function show($id){
        
        return view("brigada.show",["brigada"=>brigada::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("brigada.edit",["brigada"=>brigada::findOrFail($id),]);
    }
    public function update(BrigadaFormRequest $request,$id){
        $brigada=Brigada::findOrFail($id);
		
        $brigada->Brigada = $request->get('Brigada');
        $brigada->update();
        return Redirect::to('brigada');
    }
    public function destroy($id){
        $brigada=Brigada::findOrFail($id);
        $brigada->delete();
        return Redirect::to('brigada');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$brigada=Brigada::findOrFail($id);
		//brigada->estado='Inactivo';
        //$brigada->update();
        //return Redirect::to('brigada');
    }
}
