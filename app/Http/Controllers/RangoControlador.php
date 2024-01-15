<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Rango;
use App\Models\Rango;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\RangoFormRequest;
use App\Http\Requests\RangoFormRequest;

use DB;

class RangoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $rangos=DB::table('rango')
            ->paginate(10);
            return view('rango.index',["rangos"=>$rangos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $rangos=DB::table('rango')
            ->paginate(1000);
            return view('rango.report',["rangos"=>$rangos]);
        }
    }
    public function create(){
		
        return view("rango.create",[]);
    }
    public function store (RangoFormRequest $request){
        $rango=new Rango;
        
        $rango->Rango=$request->get('Rango');
        $rango->save();
        return Redirect::to('rango');
    }
    public function show($id){
        
        return view("rango.show",["rango"=>rango::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("rango.edit",["rango"=>rango::findOrFail($id),]);
    }
    public function update(RangoFormRequest $request,$id){
        $rango=Rango::findOrFail($id);
		
        $rango->Rango = $request->get('Rango');
        $rango->update();
        return Redirect::to('rango');
    }
    public function destroy($id){
        $rango=Rango::findOrFail($id);
        $rango->delete();
        return Redirect::to('rango');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$rango=Rango::findOrFail($id);
		//rango->estado='Inactivo';
        //$rango->update();
        //return Redirect::to('rango');
    }
}
