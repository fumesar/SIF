<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Seccional;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

use App\Http\Requests\SeccionalFormRequest;

use DB;

class SeccionalControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $seccionals=DB::table('seccional')
            ->paginate(10);
            return view('seccional.index',["seccionals"=>$seccionals,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $seccionals=DB::table('seccional')
            ->paginate(1000);
            return view('seccional.report',["seccionals"=>$seccionals]);
        }
    }
    public function create(){
		
        return view("seccional.create",[]);
    }
    public function store (SeccionalFormRequest $request){
        $seccional=new Seccional;
        
        $seccional->Seccional=$request->get('Seccional');
        $seccional->save();
        return Redirect::to('seccional');
    }
    public function show($id){
        
        return view("seccional.show",["seccional"=>seccional::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("seccional.edit",["seccional"=>seccional::findOrFail($id),]);
    }
    public function update(SeccionalFormRequest $request,$id){
        $seccional=Seccional::findOrFail($id);
		
        $seccional->Seccional = $request->get('Seccional');
        $seccional->update();
        return Redirect::to('seccional');
    }
    public function destroy($id){
        $seccional=Seccional::findOrFail($id);
        $seccional->delete();
        return Redirect::to('seccional');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$seccional=Seccional::findOrFail($id);
		//seccional->estado='Inactivo';
        //$seccional->update();
        //return Redirect::to('seccional');
    }
}
