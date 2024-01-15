<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Anotacion;
use App\Models\Anotacion;
use App\Models\Jefatura;

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
    public function create(Request $request){
        if ($request){
		    $query_Identificacion=$request->get('query_Identificacion');
            $query_Nombres=$request->get('query_Nombres');
            $query_Apellidos=$request->get('query_Apellidos');
            // if($query_Identificacion=='' and $query_Nombres=='' and  $query_Apellidos=='')
            //     $jefaturas=[];
            // else
                $jefaturas=DB::table('jefatura')
                    ->join('rango','jefatura.idRango','=','rango.idRango')
                    ->where('jefatura.NumeroDocumento',$query_Identificacion)
                    ->orWhere('Nombres',$query_Nombres)
                    ->orWhere('Apellidos',$query_Apellidos)
                    ->select('jefatura.NumeroDocumento','jefatura.idJefatura','jefatura.Nombres','jefatura.Apellidos','rango.Rango as rango')
                    ->get();
        }else{
            $jefaturas=[];
        }

        $tipo_anotacions=DB::table('tipo_anotacion')->get();
        $faltas=DB::table('falta')->get();
      
        return view("anotacion.create",["tipo_anotacions"=>$tipo_anotacions,"faltas"=>$faltas,"jefaturas"=>$jefaturas]);
    }
    public function store (AnotacionFormRequest $request){
        $idTipoAnotacion=$request->get('idTipoAnotacion');
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
        toastr()->success(__('Grabación exitosa...'));
        if($idTipoAnotacion==2){ // NEGATIVA
            $jefatura=Jefatura::findOrFail($request->get('idJefatura'));
            if($jefatura){
                $fecha = date_create($jefatura->FechaAscenso);
                date_add($fecha , date_interval_create_from_date_string("6 months"));
                $jefatura->FechaAscenso=$fecha;
                $jefatura->update();
                toastr()->info(__('Se agregaron 6 meses a la fecha de ascenso ...'));
            }
        }  
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
