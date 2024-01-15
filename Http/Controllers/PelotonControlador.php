<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Peloton;
use App\Models\Peloton;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\PelotonFormRequest;
use App\Http\Requests\PelotonFormRequest;

use DB;

class PelotonControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $pelotons=DB::table('peloton')
            ->paginate(10);
            return view('peloton.index',["pelotons"=>$pelotons,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $pelotons=DB::table('peloton')
            ->paginate(1000);
            return view('peloton.report',["pelotons"=>$pelotons]);
        }
    }
    public function create(){
		
        return view("peloton.create",[]);
    }
    public function store (PelotonFormRequest $request){
        $peloton=new Peloton;
        
        $peloton->Peloton=$request->get('Peloton');
        $peloton->save();
        return Redirect::to('peloton');
    }
    public function show($id){
        
        return view("peloton.show",["peloton"=>peloton::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("peloton.edit",["peloton"=>peloton::findOrFail($id),]);
    }
    public function update(PelotonFormRequest $request,$id){
        $peloton=Peloton::findOrFail($id);
		
        $peloton->Peloton = $request->get('Peloton');
        $peloton->update();
        return Redirect::to('peloton');
    }
    public function destroy($id){
        $peloton=Peloton::findOrFail($id);
        $peloton->delete();
        return Redirect::to('peloton');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$peloton=Peloton::findOrFail($id);
		//peloton->estado='Inactivo';
        //$peloton->update();
        //return Redirect::to('peloton');
    }
}
