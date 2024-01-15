<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Tipo_documento;
use App\Models\Tipo_documento;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\Tipo_documentoFormRequest;
use App\Http\Requests\Tipo_documentoFormRequest;

use DB;

class Tipo_documentoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $tipo_documentos=DB::table('tipo_documento')
            ->paginate(10);
            return view('tipo_documento.index',["tipo_documentos"=>$tipo_documentos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $tipo_documentos=DB::table('tipo_documento')
            ->paginate(1000);
            return view('tipo_documento.report',["tipo_documentos"=>$tipo_documentos]);
        }
    }
    public function create(){
		
        return view("tipo_documento.create",[]);
    }
    public function store (Tipo_documentoFormRequest $request){
        $tipo_documento=new Tipo_documento;
        
        $tipo_documento->TipoDocumento=$request->get('TipoDocumento');
        $tipo_documento->save();
        return Redirect::to('tipo_documento');
    }
    public function show($id){
        
        return view("tipo_documento.show",["tipo_documento"=>tipo_documento::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("tipo_documento.edit",["tipo_documento"=>tipo_documento::findOrFail($id),]);
    }
    public function update(Tipo_documentoFormRequest $request,$id){
        $tipo_documento=Tipo_documento::findOrFail($id);
		
        $tipo_documento->TipoDocumento = $request->get('TipoDocumento');
        $tipo_documento->update();
        return Redirect::to('tipo_documento');
    }
    public function destroy($id){
        $tipo_documento=Tipo_documento::findOrFail($id);
        $tipo_documento->delete();
        return Redirect::to('tipo_documento');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$tipo_documento=Tipo_documento::findOrFail($id);
		//tipo_documento->estado='Inactivo';
        //$tipo_documento->update();
        //return Redirect::to('tipo_documento');
    }
}
