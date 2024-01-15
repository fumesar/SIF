<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Anotacion;
use App\Models\Anotacion;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\AnotacionFormRequest;
use App\Http\Requests\AnotacionFormRequest;

use DB;

class AnotacionControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $anotacions=DB::table('anotacion')
            ->join('tipo_anotacion','anotacion.idTipoAnotacion','=','tipo_anotacion.idTipoAnotacion')
            ->join('falta','anotacion.idfalta','=','falta.idfalta')
            ->join('jefatura','anotacion.idJefatura','=','jefatura.idJefatura')
            ->select('anotacion.idAnotacion','anotacion.Identificacion','anotacion.Nombres','anotacion.Apellidos','anotacion.Fecha','anotacion.Titulo','anotacion.Observacion','falta.Falta as falta','jefatura.Nombres as jefatura','tipo_anotacion.TipoAnotacion as tipo_anotacion')->paginate(10);
            return view('anotacion.index',["anotacions"=>$anotacions,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        $tipo_anotacions=DB::table('tipo_anotacion')->get();
        $faltas=DB::table('falta')->get();
        if ($request){
            $query_idTipoAnotacion=trim($request->get('idTipoAnotacion'));
            $query_idfalta=trim($request->get('idfalta'));
            $anotacions=DB::table('anotacion')
            ->join('tipo_anotacion','anotacion.idTipoAnotacion','=','tipo_anotacion.idTipoAnotacion')
            ->join('falta','anotacion.idfalta','=','falta.idfalta')
            ->join('jefatura','anotacion.idJefatura','=','jefatura.idJefatura')
            ->select('anotacion.idAnotacion','anotacion.Identificacion','anotacion.Nombres','anotacion.Apellidos','anotacion.Fecha','anotacion.Titulo','anotacion.Observacion','falta.Falta as falta','jefatura.Nombres as jefatura','tipo_anotacion.TipoAnotacion as tipo_anotacion')
            ->where('anotacion.idTipoAnotacion','=',$query_idTipoAnotacion)
            ->orWhere('anotacion.idfalta','=',$query_idfalta)
            ->paginate(1000);
            return view('anotacion.report',["anotacions"=>$anotacions,"tipo_anotacions"=>$tipo_anotacions,"faltas"=>$faltas,"query_idTipoAnotacion"=>$query_idTipoAnotacion,"query_idfalta"=>$query_idfalta]);
        }
    }
    public function create(){
		
        $tipo_anotacions=DB::table('tipo_anotacion')->get();
        $faltas=DB::table('falta')->get();
        $jefaturas=DB::table('jefatura')->get();
        return view("anotacion.create",["tipo_anotacions"=>$tipo_anotacions,"faltas"=>$faltas,"jefaturas"=>$jefaturas]);
    }
    public function store (AnotacionFormRequest $request){
        $anotacion=new Anotacion;
        
        $anotacion->idJefatura=$request->get('idJefatura');
        $anotacion->Identificacion=$request->get('Identificacion');
        $anotacion->Nombres=$request->get('Nombres');
        $anotacion->Apellidos=$request->get('Apellidos');
        $anotacion->idTipoAnotacion=$request->get('idTipoAnotacion');
        $anotacion->Fecha=$request->get('Fecha');
        $anotacion->Titulo=$request->get('Titulo');
        $anotacion->idfalta=$request->get('idfalta');
        $anotacion->Observacion=$request->get('Observacion');
        $anotacion->save();
        return Redirect::to('anotacion');
    }
    public function show($id){
        
        $tipo_anotacions=DB::table('tipo_anotacion')->get();
        $faltas=DB::table('falta')->get();
        $jefaturas=DB::table('jefatura')->get();
        return view("anotacion.show",["anotacion"=>anotacion::findOrFail($id),"tipo_anotacions"=>$tipo_anotacions,"faltas"=>$faltas,"jefaturas"=>$jefaturas]);
    }
    public function edit($id){
        
        $tipo_anotacions=DB::table('tipo_anotacion')->get();
        $faltas=DB::table('falta')->get();
        $jefaturas=DB::table('jefatura')->get();
        return view("anotacion.edit",["anotacion"=>anotacion::findOrFail($id),"tipo_anotacions"=>$tipo_anotacions,"faltas"=>$faltas,"jefaturas"=>$jefaturas]);
    }
    public function update(AnotacionFormRequest $request,$id){
        $anotacion=Anotacion::findOrFail($id);
		
        $anotacion->idJefatura = $request->get('idJefatura');
        $anotacion->Identificacion = $request->get('Identificacion');
        $anotacion->Nombres = $request->get('Nombres');
        $anotacion->Apellidos = $request->get('Apellidos');
        $anotacion->idTipoAnotacion = $request->get('idTipoAnotacion');
        $anotacion->Fecha = $request->get('Fecha');
        $anotacion->Titulo = $request->get('Titulo');
        $anotacion->idfalta = $request->get('idfalta');
        $anotacion->Observacion = $request->get('Observacion');
        $anotacion->update();
        return Redirect::to('anotacion');
    }
    public function destroy($id){
        $anotacion=Anotacion::findOrFail($id);
        $anotacion->delete();
        return Redirect::to('anotacion');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$anotacion=Anotacion::findOrFail($id);
		//anotacion->estado='Inactivo';
        //$anotacion->update();
        //return Redirect::to('anotacion');
    }
}
