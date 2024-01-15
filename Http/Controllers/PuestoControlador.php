<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Puesto;
use App\Models\Puesto;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\PuestoFormRequest;
use App\Http\Requests\PuestoFormRequest;

use DB;

class PuestoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $puestos=DB::table('puesto')
            ->paginate(10);
            return view('puesto.index',["puestos"=>$puestos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $puestos=DB::table('puesto')
            ->paginate(1000);
            return view('puesto.report',["puestos"=>$puestos]);
        }
    }
    public function create(){
		
        return view("puesto.create",[]);
    }
    public function store (PuestoFormRequest $request){
        $puesto=new Puesto;
        
        $puesto->Puesto=$request->get('Puesto');
        $puesto->save();
        return Redirect::to('puesto');
    }
    public function show($id){
        
        return view("puesto.show",["puesto"=>puesto::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("puesto.edit",["puesto"=>puesto::findOrFail($id),]);
    }
    public function update(PuestoFormRequest $request,$id){
        $puesto=Puesto::findOrFail($id);
		
        $puesto->Puesto = $request->get('Puesto');
        $puesto->update();
        return Redirect::to('puesto');
    }
    public function destroy($id){
        $puesto=Puesto::findOrFail($id);
        $puesto->delete();
        return Redirect::to('puesto');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$puesto=Puesto::findOrFail($id);
		//puesto->estado='Inactivo';
        //$puesto->update();
        //return Redirect::to('puesto');
    }
}
