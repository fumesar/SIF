<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Tercero;
use App\Models\Tercero;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\TerceroFormRequest;
use App\Http\Requests\TerceroFormRequest;

use DB;

class TerceroControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            
            $terceros=DB::table('tercero')
            ->join('cargo','tercero.idCargo','=','cargo.idCargo')
            ->join('departamento_nacimiento','tercero.idDepartamentoNacimiento','=','departamento_nacimiento.idDepartamentoNacimiento')
            ->join('departamento_residencia','tercero.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
            ->join('estado','tercero.idEstado','=','estado.idEstado')
            ->join('localidad','tercero.idLocalidad','=','localidad.idLocalidad')
            ->join('nivel_academico','tercero.idNivelAcademico','=','nivel_academico.idNivelAcademico')
            ->join('profesion','tercero.idProfesion','=','profesion.idProfesion')
            ->join('rh','tercero.idRH','=','rh.idRH')
            ->join('tipo_documento','tercero.idTipoDocumento','=','tipo_documento.idTipoDocumento')
            ->join('tipo_tercero','tercero.idTipoTercero','=','tipo_tercero.idTipoTercero')
            ->select('tercero.idTercero','tercero.NumeroDocumento','tercero.Nombres','tercero.Apellidos','tercero.FechaNacimiento','tercero.CiudadNacimiento','tercero.Correo','tercero.Telefono','tercero.Direccion','tercero.CiudadResidencia','tercero.Barrio','tercero.FechaIngreso','tercero.FechaRetiro','cargo.Cargo as cargo','departamento_nacimiento.DepartamentoNacimiento as departamento_nacimiento','departamento_residencia.DepartamentoResidencia as departamento_residencia','estado.Estado as estado','localidad.Localidad as localidad','nivel_academico.NivelAcademico as nivel_academico','profesion.Profesion as profesion','rh.RH as rh','tipo_documento.TipoDocumento as tipo_documento','tipo_tercero.TipoTercero as tipo_tercero')->paginate(10);
            return view('tercero.index',["terceros"=>$terceros]);
        }
    }
    public function report(Request $request){
         $tipo_terceros=DB::table('tipo_tercero')->get();
         $estados=DB::table('estado')->get();
        if ($request){
            $query_idTipoTercero=trim($request->get('idTipoTercero'));
            $query_idEstado=trim($request->get('idEstado'));
            $terceros=DB::table('tercero')
            ->join('cargo','tercero.idCargo','=','cargo.idCargo')
            ->join('departamento_nacimiento','tercero.idDepartamentoNacimiento','=','departamento_nacimiento.idDepartamentoNacimiento')
            ->join('departamento_residencia','tercero.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
            ->join('estado','tercero.idEstado','=','estado.idEstado')
            ->join('localidad','tercero.idLocalidad','=','localidad.idLocalidad')
            ->join('nivel_academico','tercero.idNivelAcademico','=','nivel_academico.idNivelAcademico')
            ->join('profesion','tercero.idProfesion','=','profesion.idProfesion')
            ->join('rh','tercero.idRH','=','rh.idRH')
            ->join('tipo_documento','tercero.idTipoDocumento','=','tipo_documento.idTipoDocumento')
            ->join('tipo_tercero','tercero.idTipoTercero','=','tipo_tercero.idTipoTercero')
            ->select('tercero.idTercero','tercero.NumeroDocumento','tercero.Nombres','tercero.Apellidos','tercero.FechaNacimiento','tercero.CiudadNacimiento','tercero.Correo','tercero.Telefono','tercero.Direccion','tercero.CiudadResidencia','tercero.Barrio','tercero.FechaIngreso','tercero.FechaRetiro','cargo.Cargo as cargo','departamento_nacimiento.DepartamentoNacimiento as departamento_nacimiento','departamento_residencia.DepartamentoResidencia as departamento_residencia','estado.Estado as estado','localidad.Localidad as localidad','nivel_academico.NivelAcademico as nivel_academico','profesion.Profesion as profesion','rh.RH as rh','tipo_documento.TipoDocumento as tipo_documento','tipo_tercero.TipoTercero as tipo_tercero')
            ->where('tercero.idTipoTercero','=',$query_idTipoTercero)
            ->orWhere('tercero.idEstado','=',$query_idEstado)
            ->paginate(1000);
            return view('tercero.report',["terceros"=>$terceros,"tipo_terceros"=>$tipo_terceros,"estados"=>$estados,"query_idTipoTercero"=>$query_idTipoTercero,"query_idEstado"=>$query_idEstado]);
        }
    }
    public function create(){
		
        $cargos=DB::table('cargo')->get();
        $departamento_nacimientos=DB::table('departamento_nacimiento')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estados=DB::table('estado')->get();
        $localidads=DB::table('localidad')->get();
        $nivel_academicos=DB::table('nivel_academico')->get();
        $profesions=DB::table('profesion')->get();
        $rhs=DB::table('rh')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $tipo_terceros=DB::table('tipo_tercero')->get();
        return view("tercero.create",["cargos"=>$cargos,"departamento_nacimientos"=>$departamento_nacimientos,"departamento_residencias"=>$departamento_residencias,"estados"=>$estados,"localidads"=>$localidads,"nivel_academicos"=>$nivel_academicos,"profesions"=>$profesions,"rhs"=>$rhs,"tipo_documentos"=>$tipo_documentos,"tipo_terceros"=>$tipo_terceros]);
    }
    public function store (TerceroFormRequest $request){
        $tercero=new Tercero;
        
        $tercero->idTipoTercero=$request->get('idTipoTercero');
        $tercero->idTipoDocumento=$request->get('idTipoDocumento');
        $tercero->NumeroDocumento=$request->get('NumeroDocumento');
        $tercero->Nombres=$request->get('Nombres');
        $tercero->Apellidos=$request->get('Apellidos');
        $tercero->FechaNacimiento=$request->get('FechaNacimiento');
        $tercero->idDepartamentoNacimiento=$request->get('idDepartamentoNacimiento');
        $tercero->CiudadNacimiento=$request->get('CiudadNacimiento');
        $tercero->idRH=$request->get('idRH');
        $tercero->Correo=$request->get('Correo');
        $tercero->Telefono=$request->get('Telefono');
        $tercero->Direccion=$request->get('Direccion');
        $tercero->idDepartamentoResidencia=$request->get('idDepartamentoResidencia');
        $tercero->idProfesion=$request->get('idProfesion');
        $tercero->CiudadResidencia=$request->get('CiudadResidencia');
        $tercero->idNivelAcademico=$request->get('idNivelAcademico');
        $tercero->idLocalidad=$request->get('idLocalidad');
        $tercero->Barrio=$request->get('Barrio');
        $tercero->idEstado=$request->get('idEstado');
        $tercero->idCargo=$request->get('idCargo');
        $tercero->FechaIngreso=$request->get('FechaIngreso');
        $tercero->FechaRetiro=$request->get('FechaRetiro');
        $tercero->save();
        return Redirect::to('tercero');
    }
    public function show($id){
        
        $cargos=DB::table('cargo')->get();
        $departamento_nacimientos=DB::table('departamento_nacimiento')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estados=DB::table('estado')->get();
        $localidads=DB::table('localidad')->get();
        $nivel_academicos=DB::table('nivel_academico')->get();
        $profesions=DB::table('profesion')->get();
        $rhs=DB::table('rh')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $tipo_terceros=DB::table('tipo_tercero')->get();
        return view("tercero.show",["tercero"=>tercero::findOrFail($id),"cargos"=>$cargos,"departamento_nacimientos"=>$departamento_nacimientos,"departamento_residencias"=>$departamento_residencias,"estados"=>$estados,"localidads"=>$localidads,"nivel_academicos"=>$nivel_academicos,"profesions"=>$profesions,"rhs"=>$rhs,"tipo_documentos"=>$tipo_documentos,"tipo_terceros"=>$tipo_terceros]);
    }
    public function edit($id){
        
        $cargos=DB::table('cargo')->get();
        $departamento_nacimientos=DB::table('departamento_nacimiento')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estados=DB::table('estado')->get();
        $localidads=DB::table('localidad')->get();
        $nivel_academicos=DB::table('nivel_academico')->get();
        $profesions=DB::table('profesion')->get();
        $rhs=DB::table('rh')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $tipo_terceros=DB::table('tipo_tercero')->get();
        return view("tercero.edit",["tercero"=>tercero::findOrFail($id),"cargos"=>$cargos,"departamento_nacimientos"=>$departamento_nacimientos,"departamento_residencias"=>$departamento_residencias,"estados"=>$estados,"localidads"=>$localidads,"nivel_academicos"=>$nivel_academicos,"profesions"=>$profesions,"rhs"=>$rhs,"tipo_documentos"=>$tipo_documentos,"tipo_terceros"=>$tipo_terceros]);
    }
    public function update(TerceroFormRequest $request,$id){
        $tercero=Tercero::findOrFail($id);
		
        $tercero->idTipoTercero = $request->get('idTipoTercero');
        $tercero->idTipoDocumento = $request->get('idTipoDocumento');
        $tercero->NumeroDocumento = $request->get('NumeroDocumento');
        $tercero->Nombres = $request->get('Nombres');
        $tercero->Apellidos = $request->get('Apellidos');
        $tercero->FechaNacimiento = $request->get('FechaNacimiento');
        $tercero->idDepartamentoNacimiento = $request->get('idDepartamentoNacimiento');
        $tercero->CiudadNacimiento = $request->get('CiudadNacimiento');
        $tercero->idRH = $request->get('idRH');
        $tercero->Correo = $request->get('Correo');
        $tercero->Telefono = $request->get('Telefono');
        $tercero->Direccion = $request->get('Direccion');
        $tercero->idDepartamentoResidencia = $request->get('idDepartamentoResidencia');
        $tercero->idProfesion = $request->get('idProfesion');
        $tercero->CiudadResidencia = $request->get('CiudadResidencia');
        $tercero->idNivelAcademico = $request->get('idNivelAcademico');
        $tercero->idLocalidad = $request->get('idLocalidad');
        $tercero->Barrio = $request->get('Barrio');
        $tercero->idEstado = $request->get('idEstado');
        $tercero->idCargo = $request->get('idCargo');
        $tercero->FechaIngreso = $request->get('FechaIngreso');
        $tercero->FechaRetiro = $request->get('FechaRetiro');
        $tercero->update();
        return Redirect::to('tercero');
    }
    public function destroy($id){
        $tercero=Tercero::findOrFail($id);
        $tercero->delete();
        return Redirect::to('tercero');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$tercero=Tercero::findOrFail($id);
		//tercero->estado='Inactivo';
        //$tercero->update();
        //return Redirect::to('tercero');
    }
}
