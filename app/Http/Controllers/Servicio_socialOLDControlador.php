<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Servicio_social;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

use App\Http\Requests\Servicio_socialFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;

class Servicio_socialControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $servicio_socials=DB::table('servicio_social')
                ->join('brigada','servicio_social.idBrigada','=','brigada.idBrigada')
                ->join('colegio','servicio_social.idColegio','=','colegio.idColegio')
                ->join('departamento_residencia','servicio_social.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
                ->join('estado','servicio_social.idEstado','=','estado.idEstado')
                ->join('jornada','servicio_social.idJornada','=','jornada.idJornada')
                ->join('localidad','servicio_social.idLocalidad','=','localidad.idLocalidad')
                ->join('peloton','servicio_social.idPeloton','=','peloton.idPeloton')
                ->join('seccional','servicio_social.idSeccional','=','seccional.idSeccional')
                ->join('tipo_documento','servicio_social.idTipoDocumento','=','tipo_documento.idTipoDocumento')
                ->join('curso_colegio','servicio_social.idCursoCol','=','curso_colegio.idCursoCol')
                ->join('semestre','servicio_social.idSemestre','=','semestre.idSemestre')
                ->OrWhere('NumeroDocumento','like','%'.$query.'%')
                ->OrWhere('Nombres','like','%'.$query.'%')
                ->OrWhere('Apellidos','like','%'.$query.'%')
                ->select('servicio_social.idServicioSocial','servicio_social.NumeroDocumento','servicio_social.Nombres','servicio_social.Apellidos','servicio_social.Telefono','servicio_social.Direccion','servicio_social.CiudadResidencia','servicio_social.Correo','servicio_social.Barrio','servicio_social.Horas','servicio_social.FechaIngreso','servicio_social.FechaFinalizacion','brigada.Brigada as brigada','colegio.Colegio as colegio','curso_colegio.Curso as curso_colegio','departamento_residencia.DepartamentoResidencia as departamento_residencia','estado.Estado as estado','jornada.Jornada as jornada','localidad.Localidad as localidad','peloton.Peloton as peloton','seccional.Seccional as seccional','semestre.Semestre as semestre','tipo_documento.TipoDocumento as tipo_documento')->paginate(10);
            return view('servicio_social.index',["servicio_socials"=>$servicio_socials,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        $brigadas=DB::table('brigada')->get();
        $estados=DB::table('estado')->get();
        $pelotons=DB::table('peloton')->get();
        $seccionals=DB::table('seccional')->get();
        $colegios=DB::table('colegio')->get();
        $semestres=DB::table('semestre')->get();

        if ($request){
            $query_idEstado=trim($request->get('idEstado'));
            $query_idSeccional=trim($request->get('idSeccional'));
            $query_idBrigada=trim($request->get('idBrigada'));
            $query_idPeloton=trim($request->get('idPeloton'));
            $query_idColegio=trim($request->get('idColegio'));
            $query_idSemestre=trim($request->get('idSemestre'));
            if($query_idEstado=='' and $query_idSeccional=='' and $query_idBrigada=='' and $query_idPeloton=='' and $query_idColegio=='' and $query_idSemestre==''){
                $servicio_socials=Servicio_social::where('idEstado',100000)->paginate(10);
            }else{
                $servicio_socials=Servicio_social::estado($query_idEstado)->seccional($query_idSeccional)->brigada($query_idBrigada)->peloton($query_idPeloton)->colegio($query_idColegio)->semestre($query_idSemestre)
                ->join('brigada','servicio_social.idBrigada','=','brigada.idBrigada')
                ->join('colegio','servicio_social.idColegio','=','colegio.idColegio')
                ->join('departamento_residencia','servicio_social.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
                ->join('estado','servicio_social.idEstado','=','estado.idEstado')
                ->join('jornada','servicio_social.idJornada','=','jornada.idJornada')
                ->join('localidad','servicio_social.idLocalidad','=','localidad.idLocalidad')
                ->join('peloton','servicio_social.idPeloton','=','peloton.idPeloton')
                ->join('seccional','servicio_social.idSeccional','=','seccional.idSeccional')
                ->join('tipo_documento','servicio_social.idTipoDocumento','=','tipo_documento.idTipoDocumento')
                ->join('curso_colegio','servicio_social.idCursoCol','=','curso_colegio.idCursoCol')
                ->join('semestre','servicio_social.idSemestre','=','semestre.idSemestre')
                ->select('servicio_social.idServicioSocial','servicio_social.NumeroDocumento','servicio_social.Nombres','servicio_social.Apellidos','servicio_social.Telefono','servicio_social.Direccion','servicio_social.CiudadResidencia','servicio_social.Correo','servicio_social.Barrio','servicio_social.Horas','servicio_social.FechaIngreso','servicio_social.FechaFinalizacion','brigada.Brigada as brigada','colegio.Colegio as colegio','curso_colegio.Curso as curso_colegio','departamento_residencia.DepartamentoResidencia as departamento_residencia','estado.Estado as estado','jornada.Jornada as jornada','localidad.Localidad as localidad','peloton.Peloton as peloton','seccional.Seccional as seccional','semestre.Semestre as semestre','tipo_documento.TipoDocumento as tipo_documento')
                ->paginate(1000);
            }
            return view('servicio_social.report',["servicio_socials"=>$servicio_socials,"estados"=>$estados,"pelotons"=>$pelotons,"seccionals"=>$seccionals,"brigadas"=>$brigadas,"query_idEstado"=>$query_idEstado,"query_idPeloton"=>$query_idPeloton,"query_idSeccional"=>$query_idSeccional,"query_idBrigada"=>$query_idBrigada,"query_idColegio"=>$query_idColegio,"query_idSemestre"=>$query_idSemestre,"colegios"=>$colegios,"semestres"=>$semestres]);
        }
    }
    public function indexCertificados(Request $request){
        if ($request){
            // $query=trim($request->get('searchText'));
            $asistencias=DB::table('asistencia_servicio_social')
                ->select('idServicioSocial',DB::raw('count(*) as conteoAsistencias'))->where('idEstadoAsistencia',1)->orWhere('idEstadoAsistencia',3)->groupBy('idServicioSocial');
            $servicio_socials=Servicio_social::certificado()
            ->join('brigada','servicio_social.idBrigada','=','brigada.idBrigada')
            ->join('colegio','servicio_social.idColegio','=','colegio.idColegio')
            ->join('departamento_residencia','servicio_social.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
            ->join('estado','servicio_social.idEstado','=','estado.idEstado')
            ->join('jornada','servicio_social.idJornada','=','jornada.idJornada')
            ->join('localidad','servicio_social.idLocalidad','=','localidad.idLocalidad')
            ->join('peloton','servicio_social.idPeloton','=','peloton.idPeloton')
            ->join('seccional','servicio_social.idSeccional','=','seccional.idSeccional')
            ->join('tipo_documento','servicio_social.idTipoDocumento','=','tipo_documento.idTipoDocumento')
            ->join('curso_colegio','servicio_social.idCursoCol','=','curso_colegio.idCursoCol')
            ->join('semestre','servicio_social.idSemestre','=','semestre.idSemestre')
            ->leftJoinSub($asistencias, 'asistencias', function ($join) {
                $join->on('asistencias.idServicioSocial', '=', 'servicio_social.idServicioSocial');
            })
            ->select('servicio_social.idServicioSocial','servicio_social.NumeroDocumento','servicio_social.Nombres','servicio_social.Apellidos','servicio_social.Telefono','servicio_social.Direccion','servicio_social.CiudadResidencia','servicio_social.Correo','servicio_social.Barrio','servicio_social.Horas','servicio_social.FechaIngreso','servicio_social.FechaFinalizacion','brigada.Brigada as brigada','colegio.Colegio as colegio','curso_colegio.Curso as curso_colegio','departamento_residencia.DepartamentoResidencia as departamento_residencia','estado.Estado as estado','jornada.Jornada as jornada','localidad.Localidad as localidad','peloton.Peloton as peloton','seccional.Seccional as seccional','semestre.Semestre as semestre','tipo_documento.TipoDocumento as tipo_documento','asistencias.conteoAsistencias')->paginate(10);
            return view('servicio_social.indexCertificados',["servicio_socials"=>$servicio_socials]);
        }
    }
    public function create(){
		
        $brigadas=DB::table('brigada')->get();
        $colegios=DB::table('colegio')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estados=DB::table('estado')->get();
        $jornadas=DB::table('jornada')->get();
        $localidads=DB::table('localidad')->get();
        $pelotons=DB::table('peloton')->get();
        $seccionals=DB::table('seccional')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $curso_colegios=DB::table('curso_colegio')->get();
        $semestres=DB::table('semestre')->get();
        return view("servicio_social.create",["brigadas"=>$brigadas,"colegios"=>$colegios,"departamento_residencias"=>$departamento_residencias,"estados"=>$estados,"jornadas"=>$jornadas,"localidads"=>$localidads,"pelotons"=>$pelotons,"seccionals"=>$seccionals,"tipo_documentos"=>$tipo_documentos,"curso_colegios"=>$curso_colegios,"semestres"=>$semestres]);
    }
    public function store (Servicio_socialFormRequest $request){
        $servicio_social=new Servicio_social;
        
        $servicio_social->idTipoDocumento=$request->get('idTipoDocumento');
        $servicio_social->NumeroDocumento=$request->get('NumeroDocumento');
        $servicio_social->Nombres=$request->get('Nombres');
        $servicio_social->Apellidos=$request->get('Apellidos');
        $servicio_social->Telefono=$request->get('Telefono');
        $servicio_social->Direccion=$request->get('Direccion');
        $servicio_social->idDepartamentoResidencia=$request->get('idDepartamentoResidencia');
        $servicio_social->CiudadResidencia=$request->get('CiudadResidencia');
        $servicio_social->Correo=$request->get('Correo');
        $servicio_social->idLocalidad=$request->get('idLocalidad');
        $servicio_social->Barrio=$request->get('Barrio');
        $servicio_social->idColegio=$request->get('idColegio');
        $servicio_social->idCursoCol=$request->get('idCursoCol');
        $servicio_social->idJornada=$request->get('idJornada');
        $servicio_social->Horas=$request->get('Horas');
        $servicio_social->idEstado=$request->get('idEstado');
        $servicio_social->idSeccional=$request->get('idSeccional');
        $servicio_social->idBrigada=$request->get('idBrigada');
        $servicio_social->idPeloton=$request->get('idPeloton');
        $servicio_social->FechaIngreso=$request->get('FechaIngreso');
        $servicio_social->FechaFinalizacion=$request->get('FechaFinalizacion');
        $servicio_social->idSemestre=$request->get('idSemestre');
        if($request->hasFile('Foto')){   
            $servicio_social->Foto=$request->file('Foto')->store('public/servicio_social');
        }
        $servicio_social->save();
        return Redirect::to('servicio_social');
    }
    public function show($id){
        
        $brigadas=DB::table('brigada')->get();
        $colegios=DB::table('colegio')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estados=DB::table('estado')->get();
        $jornadas=DB::table('jornada')->get();
        $localidads=DB::table('localidad')->get();
        $pelotons=DB::table('peloton')->get();
        $seccionals=DB::table('seccional')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $curso_colegios=DB::table('curso_colegio')->get();
        $semestres=DB::table('semestre')->get();
        return view("servicio_social.show",["servicio_social"=>servicio_social::findOrFail($id),"brigadas"=>$brigadas,"colegios"=>$colegios,"departamento_residencias"=>$departamento_residencias,"estados"=>$estados,"jornadas"=>$jornadas,"localidads"=>$localidads,"pelotons"=>$pelotons,"seccionals"=>$seccionals,"tipo_documentos"=>$tipo_documentos,"curso_colegios"=>$curso_colegios,"semestres"=>$semestres]);
    }
    public function certificado($id){
        $servicio_social=servicio_social::findOrFail($id);
        $brigadas=DB::table('brigada')->get();
        $colegios=DB::table('colegio')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estados=DB::table('estado')->get();
        $jornadas=DB::table('jornada')->get();
        $localidads=DB::table('localidad')->get();
        $pelotons=DB::table('peloton')->get();
        $seccionals=DB::table('seccional')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $curso_colegios=DB::table('curso_colegio')->get();
        $semestres=DB::table('semestre')->get();
        // En caso de no tener una fecha de certificado, lo actualiza
        if(!$servicio_social->FechaCertificado){
            $servicio_social->FechaCertificado=date('y-m-d');
            $servicio_social->update();
        }
        $fecha=$this->obtenerFechaEnLetra(date($servicio_social->FechaCertificado));
        //dd($fecha);
        return view("servicio_social.certificado",["servicio_social"=>$servicio_social,"brigadas"=>$brigadas,"colegios"=>$colegios,"departamento_residencias"=>$departamento_residencias,"estados"=>$estados,"jornadas"=>$jornadas,"localidads"=>$localidads,"pelotons"=>$pelotons,"seccionals"=>$seccionals,"tipo_documentos"=>$tipo_documentos,"curso_colegios"=>$curso_colegios,"semestres"=>$semestres,'fecha'=>$fecha]); //->with('fecha',$fecha)
    }
    public function edit($id){
        
        $brigadas=DB::table('brigada')->get();
        $colegios=DB::table('colegio')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estados=DB::table('estado')->get();
        $jornadas=DB::table('jornada')->get();
        $localidads=DB::table('localidad')->get();
        $pelotons=DB::table('peloton')->get();
        $seccionals=DB::table('seccional')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $curso_colegios=DB::table('curso_colegio')->get();
        $semestres=DB::table('semestre')->get();
        return view("servicio_social.edit",["servicio_social"=>servicio_social::findOrFail($id),"brigadas"=>$brigadas,"colegios"=>$colegios,"departamento_residencias"=>$departamento_residencias,"estados"=>$estados,"jornadas"=>$jornadas,"localidads"=>$localidads,"pelotons"=>$pelotons,"seccionals"=>$seccionals,"tipo_documentos"=>$tipo_documentos,"curso_colegios"=>$curso_colegios,"semestres"=>$semestres]);
    }
    public function update(Servicio_socialFormRequest $request,$id){
        $servicio_social=Servicio_social::findOrFail($id);
		
        $servicio_social->idTipoDocumento = $request->get('idTipoDocumento');
        $servicio_social->NumeroDocumento = $request->get('NumeroDocumento');
        $servicio_social->Nombres = $request->get('Nombres');
        $servicio_social->Apellidos = $request->get('Apellidos');
        $servicio_social->Telefono = $request->get('Telefono');
        $servicio_social->Direccion = $request->get('Direccion');
        $servicio_social->idDepartamentoResidencia = $request->get('idDepartamentoResidencia');
        $servicio_social->CiudadResidencia = $request->get('CiudadResidencia');
        $servicio_social->Correo = $request->get('Correo');
        $servicio_social->idLocalidad = $request->get('idLocalidad');
        $servicio_social->Barrio = $request->get('Barrio');
        $servicio_social->idColegio = $request->get('idColegio');
        $servicio_social->idCursoCol = $request->get('idCursoCol');
        $servicio_social->idJornada = $request->get('idJornada');
        $servicio_social->Horas = $request->get('Horas');
        $servicio_social->idEstado = $request->get('idEstado');
        $servicio_social->idSeccional = $request->get('idSeccional');
        $servicio_social->idBrigada = $request->get('idBrigada');
        $servicio_social->idPeloton = $request->get('idPeloton');
        $servicio_social->FechaIngreso = $request->get('FechaIngreso');
        $servicio_social->FechaFinalizacion = $request->get('FechaFinalizacion');
        $servicio_social->idSemestre = $request->get('idSemestre');
        if($request->hasFile('Foto')){   
            Storage::delete($servicio_social->Foto);
            $servicio_social->Foto=$request->file('Foto')->store('public/servicio_social');
        }else{
            Storage::delete($servicio_social->Foto);
            $servicio_social->Foto=$request->file('Foto');
        }
        $servicio_social->update();
        return Redirect::to('servicio_social');
    }
    public function destroy($id){
        try{
            $servicio_social=Servicio_social::findOrFail($id);
            $servicio_social->delete();
         }catch(\Exception $e){
            return Redirect::to('servicio_social')->with('error','No se pudo eliminar'); //.$e->getMessage());
        }
        return Redirect::to('servicio_social');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$servicio_social=Servicio_social::findOrFail($id);
		//servicio_social->estado='Inactivo';
        //$servicio_social->update();
        //return Redirect::to('servicio_social');
    }

    private function obtenerFechaEnLetra($fecha){
        $dia= $this->conocerDiaSemanaFecha($fecha);
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        //return $dia.', '.$num.' de '.$mes.' del '.$anno;
        return $num.' días del mes de '.$mes.' del '.$anno;
    }
     
    private function conocerDiaSemanaFecha($fecha) {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }
}
