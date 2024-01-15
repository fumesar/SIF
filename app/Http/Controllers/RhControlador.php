<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Rh;
use App\Models\Rh;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\RhFormRequest;
use App\Http\Requests\RhFormRequest;

use DB;

class RhControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $rhs=DB::table('rh')
            ->paginate(10);
            return view('rh.index',["rhs"=>$rhs,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $rhs=DB::table('rh')
            ->paginate(1000);
            return view('rh.report',["rhs"=>$rhs]);
        }
    }
    public function create(){
		
        return view("rh.create",[]);
    }
    public function store (RhFormRequest $request){
        $rh=new Rh;
        
        $rh->RH=$request->get('RH');
        $rh->save();
        return Redirect::to('rh');
    }
    public function show($id){
        
        return view("rh.show",["rh"=>rh::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("rh.edit",["rh"=>rh::findOrFail($id),]);
    }
    public function update(RhFormRequest $request,$id){
        $rh=Rh::findOrFail($id);
		
        $rh->RH = $request->get('RH');
        $rh->update();
        return Redirect::to('rh');
    }
    public function destroy($id){
        $rh=Rh::findOrFail($id);
        $rh->delete();
        return Redirect::to('rh');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$rh=Rh::findOrFail($id);
		//rh->estado='Inactivo';
        //$rh->update();
        //return Redirect::to('rh');
    }
}
