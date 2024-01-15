<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Antiguedad;
use App\Models\Antiguedad;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\AntiguedadFormRequest;
use App\Http\Requests\AntiguedadFormRequest;

use DB;

class AntiguedadControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $antiguedads=DB::table('antiguedad')
            ->join('rango','antiguedad.idRango','=','rango.idRango')
            ->join('rango','antiguedad.idRangoAnterior','=','rango.idRango')
            ->select('antiguedad.idantiguedad','antiguedad.anos','rango.Rango as rango')->paginate(10);
            return view('antiguedad.index',["antiguedads"=>$antiguedads,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $antiguedads=DB::table('antiguedad')
            ->join('rango','antiguedad.idRango','=','rango.idRango')
            ->join('rango','antiguedad.idRangoAnterior','=','rango.idRango')
            ->select('antiguedad.idantiguedad','antiguedad.anos','rango.Rango as rango')->paginate(1000);
            return view('antiguedad.report',["antiguedads"=>$antiguedads]);
        }
    }
    public function create(){
		
        $rangos=DB::table('rango')->get();
        $rangos=DB::table('rango')->get();
        return view("antiguedad.create",["rangos"=>$rangos,"rangos"=>$rangos]);
    }
    public function store (AntiguedadFormRequest $request){
        $antiguedad=new Antiguedad;
        
        $antiguedad->idRango=$request->get('idRango');
        $antiguedad->anos=$request->get('anos');
        $antiguedad->idRangoAnterior=$request->get('idRangoAnterior');
        $antiguedad->save();
        return Redirect::to('antiguedad');
    }
    public function show($id){
        
        $rangos=DB::table('rango')->get();
        $rangos=DB::table('rango')->get();
        return view("antiguedad.show",["antiguedad"=>antiguedad::findOrFail($id),"rangos"=>$rangos,"rangos"=>$rangos]);
    }
    public function edit($id){
        
        $rangos=DB::table('rango')->get();
        $rangos=DB::table('rango')->get();
        return view("antiguedad.edit",["antiguedad"=>antiguedad::findOrFail($id),"rangos"=>$rangos,"rangos"=>$rangos]);
    }
    public function update(AntiguedadFormRequest $request,$id){
        $antiguedad=Antiguedad::findOrFail($id);
		
        $antiguedad->idRango = $request->get('idRango');
        $antiguedad->anos = $request->get('anos');
        $antiguedad->idRangoAnterior = $request->get('idRangoAnterior');
        $antiguedad->update();
        return Redirect::to('antiguedad');
    }
    public function destroy($id){
        $antiguedad=Antiguedad::findOrFail($id);
        $antiguedad->delete();
        return Redirect::to('antiguedad');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$antiguedad=Antiguedad::findOrFail($id);
		//antiguedad->estado='Inactivo';
        //$antiguedad->update();
        //return Redirect::to('antiguedad');
    }
}
