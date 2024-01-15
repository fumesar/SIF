<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Jefatura;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

use App\Http\Requests\JefaturaFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use DateTime;

class JefaturaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $jefaturas=DB::table('jefatura')
            ->join('brigada','jefatura.idBrigada','=','brigada.idBrigada')
            ->join('cargo','jefatura.idCargo','=','cargo.idCargo')
            ->join('departamento_nacimiento','jefatura.idDepartamentoNacimiento','=','departamento_nacimiento.idDepartamentoNacimiento')
            ->join('departamento_residencia','jefatura.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
            ->join('estado_jefatura','jefatura.idEstado','=','estado_jefatura.idEstado')
            ->join('localidad','jefatura.idLocalidad','=','localidad.idLocalidad')
            ->join('nivel_academico','jefatura.idNivelAcademico','=','nivel_academico.idNivelAcademico')
            ->join('peloton','jefatura.idPeloton','=','peloton.idPeloton')
            ->join('rh','jefatura.idRH','=','rh.idRH')
            ->join('rango','jefatura.idRango','=','rango.idRango')
            ->join('seccional','jefatura.idSeccional','=','seccional.idSeccional')
            ->join('tipo_documento','jefatura.idTipoDocumento','=','tipo_documento.idTipoDocumento')
            ->join('puesto','jefatura.idPuesto','=','puesto.idPuesto')
            ->OrWhere('NumeroDocumento','like','%'.$query.'%')
            ->OrWhere('Nombres','like','%'.$query.'%')
            ->OrWhere('Apellidos','like','%'.$query.'%')
            ->orderBy('jefatura.idRango','asc')
            ->orderBy('jefatura.FechaIngreso','asc')
            ->orderByRaw('CAST(puesto.Puesto AS UNSIGNED) ASC')
            ->select('jefatura.idJefatura','jefatura.NumeroDocumento','jefatura.Nombres','jefatura.Apellidos','jefatura.Foto','jefatura.FechaNacimiento','jefatura.CiudadNacimiento','jefatura.Correo','jefatura.Telefono','jefatura.Direccion','jefatura.CiudadResidencia','jefatura.Barrio','jefatura.FechaIngreso','jefatura.Antiguedad','jefatura.FechaAscenso','jefatura.FechaRetiro','brigada.Brigada as brigada','cargo.Cargo as cargo','departamento_nacimiento.DepartamentoNacimiento as departamento_nacimiento','departamento_residencia.DepartamentoResidencia as departamento_residencia','estado_jefatura.Estado as estado_jefatura','localidad.Localidad as localidad','nivel_academico.NivelAcademico as nivel_academico','peloton.Peloton as peloton','puesto.Puesto as puesto','rango.Rango as rango','rh.RH as rh','seccional.Seccional as seccional','tipo_documento.TipoDocumento as tipo_documento')->paginate(10);
            return view('jefatura.index',["jefaturas"=>$jefaturas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        $estado_jefaturas=DB::table('estado_jefatura')->get();
        $rangos=DB::table('rango')->get();
        $puestos=DB::table('puesto')->get();
        $seccionals=DB::table('seccional')->get();
        $brigadas=DB::table('brigada')->get();
        if ($request){
            $query_idEstado=trim($request->get('idEstado'));
            $query_idRango=trim($request->get('idRango'));
            $query_idPuesto=trim($request->get('idPuesto'));
            $query_idSeccional=trim($request->get('idSeccional'));
            $query_idBrigada=trim($request->get('idBrigada'));
            $jefaturas=Jefatura::estado($query_idEstado)->rango($query_idRango)->puesto($query_idPuesto)->seccional($query_idSeccional)->brigada($query_idBrigada)
            ->join('brigada','jefatura.idBrigada','=','brigada.idBrigada')
            ->join('cargo','jefatura.idCargo','=','cargo.idCargo')
            ->join('departamento_nacimiento','jefatura.idDepartamentoNacimiento','=','departamento_nacimiento.idDepartamentoNacimiento')
            ->join('departamento_residencia','jefatura.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
            ->join('estado_jefatura','jefatura.idEstado','=','estado_jefatura.idEstado')
            ->join('localidad','jefatura.idLocalidad','=','localidad.idLocalidad')
            ->join('nivel_academico','jefatura.idNivelAcademico','=','nivel_academico.idNivelAcademico')
            ->join('peloton','jefatura.idPeloton','=','peloton.idPeloton')
            ->join('rh','jefatura.idRH','=','rh.idRH')
            ->join('rango','jefatura.idRango','=','rango.idRango')
            ->join('seccional','jefatura.idSeccional','=','seccional.idSeccional')
            ->join('tipo_documento','jefatura.idTipoDocumento','=','tipo_documento.idTipoDocumento')
            ->join('puesto','jefatura.idPuesto','=','puesto.idPuesto')
            ->orderBy('jefatura.idRango','asc')
            ->orderBy('jefatura.FechaIngreso','asc')
            ->orderByRaw('CAST(puesto.Puesto AS UNSIGNED) ASC')
            ->select('jefatura.idJefatura','jefatura.NumeroDocumento','jefatura.Nombres','jefatura.Apellidos','jefatura.FechaNacimiento','jefatura.CiudadNacimiento','jefatura.Correo','jefatura.Telefono','jefatura.Direccion','jefatura.CiudadResidencia','jefatura.Barrio','jefatura.FechaIngreso','jefatura.Antiguedad','jefatura.FechaAscenso','jefatura.FechaRetiro','brigada.Brigada as brigada','cargo.Cargo as cargo','departamento_nacimiento.DepartamentoNacimiento as departamento_nacimiento','departamento_residencia.DepartamentoResidencia as departamento_residencia','estado_jefatura.Estado as estado_jefatura','localidad.Localidad as localidad','nivel_academico.NivelAcademico as nivel_academico','peloton.Peloton as peloton','puesto.Puesto as puesto','rango.Rango as rango','rh.RH as rh','seccional.Seccional as seccional','tipo_documento.TipoDocumento as tipo_documento')
                ->get();
            if($jefaturas){
                if($query_idRango){
                    $jefaturas = $jefaturas->sortBy('FechaIngreso');
                    
                }
                if($query_idPuesto){
                    $jefaturas = $jefaturas->sortBy('FechaIngreso');
                    
                }
            }
            return view('jefatura.report',["jefaturas"=>$jefaturas,"estado_jefaturas"=>$estado_jefaturas,"rangos"=>$rangos,"puestos"=>$puestos,"seccionals"=>$seccionals,"brigadas"=>$brigadas,"query_idEstado"=>$query_idEstado,"query_idRango"=>$query_idRango,"query_idBrigada"=>$query_idBrigada,"query_idSeccional"=>$query_idSeccional,"query_idPuesto"=>$query_idPuesto]);
        }
    }
    public function create(){
		
        $brigadas=DB::table('brigada')->get();
        $cargos=DB::table('cargo')->get();
        $departamento_nacimientos=DB::table('departamento_nacimiento')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estado_jefaturas=DB::table('estado_jefatura')->get();
        $localidads=DB::table('localidad')->get();
        $nivel_academicos=DB::table('nivel_academico')->get();
        $pelotons=DB::table('peloton')->get();
        $rhs=DB::table('rh')->get();
        $rangos=DB::table('rango')->get();
        $seccionals=DB::table('seccional')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $puestos=DB::table('puesto')->get();
        return view("jefatura.create",["brigadas"=>$brigadas,"cargos"=>$cargos,"departamento_nacimientos"=>$departamento_nacimientos,"departamento_residencias"=>$departamento_residencias,"estado_jefaturas"=>$estado_jefaturas,"localidads"=>$localidads,"nivel_academicos"=>$nivel_academicos,"pelotons"=>$pelotons,"rhs"=>$rhs,"rangos"=>$rangos,"seccionals"=>$seccionals,"tipo_documentos"=>$tipo_documentos,"puestos"=>$puestos]);
    }
    public function store (JefaturaFormRequest $request){
        $jefatura=new Jefatura;
        
        $jefatura->idTipoDocumento=$request->get('idTipoDocumento');
        $jefatura->NumeroDocumento=$request->get('NumeroDocumento');
        $jefatura->Nombres=$request->get('Nombres');
        $jefatura->Apellidos=$request->get('Apellidos');
        $jefatura->FechaNacimiento=$request->get('FechaNacimiento');
        $jefatura->idDepartamentoNacimiento=$request->get('idDepartamentoNacimiento');
        $jefatura->CiudadNacimiento=$request->get('CiudadNacimiento');
        $jefatura->idRH=$request->get('idRH');
        $jefatura->Correo=$request->get('Correo');
        $jefatura->Telefono=$request->get('Telefono');
        $jefatura->idNivelAcademico=$request->get('idNivelAcademico');
        $jefatura->Direccion=$request->get('Direccion');
        $jefatura->idDepartamentoResidencia=$request->get('idDepartamentoResidencia');
        $jefatura->CiudadResidencia=$request->get('CiudadResidencia');
        $jefatura->idLocalidad=$request->get('idLocalidad');
        $jefatura->Barrio=$request->get('Barrio');
        $jefatura->idEstado=$request->get('idEstado');
        $jefatura->idRango=$request->get('idRango');
        $jefatura->idCargo=$request->get('idCargo');
        $jefatura->idSeccional=$request->get('idSeccional');
        $jefatura->idBrigada=$request->get('idBrigada');
        $jefatura->idPeloton=$request->get('idPeloton');
        $jefatura->FechaIngreso=$request->get('FechaIngreso');
        $jefatura->idPuesto=$request->get('idPuesto');
        $jefatura->Antiguedad=$request->get('Antiguedad');
        $jefatura->FechaAscenso=$request->get('FechaAscenso');
        $jefatura->FechaRetiro=$request->get('FechaRetiro');
        if($request->hasFile('Foto')){   
            $jefatura->Foto=$request->file('Foto')->store('public/jefatura');
        }
        $jefatura->save();
        return Redirect::to('jefatura');
    }
    public function show($id){
        
        $brigadas=DB::table('brigada')->get();
        $cargos=DB::table('cargo')->get();
        $departamento_nacimientos=DB::table('departamento_nacimiento')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estado_jefaturas=DB::table('estado_jefatura')->get();
        $localidads=DB::table('localidad')->get();
        $nivel_academicos=DB::table('nivel_academico')->get();
        $pelotons=DB::table('peloton')->get();
        $rhs=DB::table('rh')->get();
        $rangos=DB::table('rango')->get();
        $seccionals=DB::table('seccional')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $puestos=DB::table('puesto')->get();
        return view("jefatura.show",["jefatura"=>jefatura::findOrFail($id),"brigadas"=>$brigadas,"cargos"=>$cargos,"departamento_nacimientos"=>$departamento_nacimientos,"departamento_residencias"=>$departamento_residencias,"estado_jefaturas"=>$estado_jefaturas,"localidads"=>$localidads,"nivel_academicos"=>$nivel_academicos,"pelotons"=>$pelotons,"rhs"=>$rhs,"rangos"=>$rangos,"seccionals"=>$seccionals,"tipo_documentos"=>$tipo_documentos,"puestos"=>$puestos]);
    }
    public function edit($id){
        
        $brigadas=DB::table('brigada')->get();
        $cargos=DB::table('cargo')->get();
        $departamento_nacimientos=DB::table('departamento_nacimiento')->get();
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $estado_jefaturas=DB::table('estado_jefatura')->get();
        $localidads=DB::table('localidad')->get();
        $nivel_academicos=DB::table('nivel_academico')->get();
        $pelotons=DB::table('peloton')->get();
        $rhs=DB::table('rh')->get();
        $rangos=DB::table('rango')->get();
        $seccionals=DB::table('seccional')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        $puestos=DB::table('puesto')->get();
        return view("jefatura.edit",["jefatura"=>jefatura::findOrFail($id),"brigadas"=>$brigadas,"cargos"=>$cargos,"departamento_nacimientos"=>$departamento_nacimientos,"departamento_residencias"=>$departamento_residencias,"estado_jefaturas"=>$estado_jefaturas,"localidads"=>$localidads,"nivel_academicos"=>$nivel_academicos,"pelotons"=>$pelotons,"rhs"=>$rhs,"rangos"=>$rangos,"seccionals"=>$seccionals,"tipo_documentos"=>$tipo_documentos,"puestos"=>$puestos]);
    }

    public function update(JefaturaFormRequest $request,$id){
        $jefatura=Jefatura::findOrFail($id);
		
        $jefatura->idTipoDocumento = $request->get('idTipoDocumento');
        $jefatura->NumeroDocumento = $request->get('NumeroDocumento');
        $jefatura->Nombres = $request->get('Nombres');
        $jefatura->Apellidos = $request->get('Apellidos');
        $jefatura->FechaNacimiento = $request->get('FechaNacimiento');
        $jefatura->idDepartamentoNacimiento = $request->get('idDepartamentoNacimiento');
        $jefatura->CiudadNacimiento = $request->get('CiudadNacimiento');
        $jefatura->idRH = $request->get('idRH');
        $jefatura->Correo = $request->get('Correo');
        $jefatura->Telefono = $request->get('Telefono');
        $jefatura->idNivelAcademico = $request->get('idNivelAcademico');
        $jefatura->Direccion = $request->get('Direccion');
        $jefatura->idDepartamentoResidencia = $request->get('idDepartamentoResidencia');
        $jefatura->CiudadResidencia = $request->get('CiudadResidencia');
        $jefatura->idLocalidad = $request->get('idLocalidad');
        $jefatura->Barrio = $request->get('Barrio');
        $jefatura->idEstado = $request->get('idEstado');
        //$jefatura->idRango = $request->get('idRango');
        $jefatura->idCargo = $request->get('idCargo');
        $jefatura->idSeccional = $request->get('idSeccional');
        $jefatura->idBrigada = $request->get('idBrigada');
        $jefatura->idPeloton = $request->get('idPeloton');
        $jefatura->FechaIngreso = $request->get('FechaIngreso');
        $jefatura->idPuesto = $request->get('idPuesto');
        $jefatura->Antiguedad = $request->get('Antiguedad');
        $jefatura->FechaAscenso = $request->get('FechaAscenso');
        $jefatura->FechaRetiro = $request->get('FechaRetiro');
        if($request->hasFile('Foto')){   
            Storage::delete($jefatura->Foto);
            $jefatura->Foto=$request->file('Foto')->store('public/jefatura');
        // }else{
        //     Storage::delete($jefatura->Foto);
        //     $jefatura->Foto=$request->file('Foto');
        }
        $jefatura->update();
        return Redirect::to('jefatura');
    }
    public function destroy($id){
        try{
            $jefatura=Jefatura::findOrFail($id);
            $jefatura->delete();
        }catch(\Exception $e){
           return Redirect::to('jefatura')->with('error','No se pudo eliminar, esta siendo usado '); //.$e->getMessage());
        }
        return Redirect::to('jefatura');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$jefatura=Jefatura::findOrFail($id);
		//jefatura->estado='Inactivo';
        //$jefatura->update();
        //return Redirect::to('jefatura');
    }
    public function getJefatura($documento){
      $jefatura = Jefatura::where('NumeroDocumento', $documento)->get();
      return $jefatura;
    }

    public function ascender($id){
        $jefatura=jefatura::findOrFail($id);
        $rangoActual=DB::table('rango')->where('idRango',$jefatura->idRango)->value('Rango');
        $tipo_documentos=DB::table('tipo_documento')->get();
        $rango=DB::table('rango')->where('idRango','<',$jefatura->idRango)->orderBy('idRango','DESC')->first();
        //dd($jefatura,$rango);

        // Que debe de cumplir
        $cursosPorCumplir=DB::table('cursoxrango')->join('curso','curso.idCurso','=','cursoxrango.idCurso')
                ->where('idRango',$rango->idRango)->select('curso.idCurso','curso.NombreCurso')->get();
        $cursosPorCumplirArreglo=DB::table('cursoxrango')->where('idRango',$rango->idRango)->pluck('idCurso');
        //dd($cursosPorCumplir,$cursosPorCumplirArreglo);
        $tiempo_rango=DB::table('tiempo_rango')->where('idRango',$rango->idRango)->first(); 
        // cursos que llevo
        $cursosLlevo=DB::table('calificacion')->where('idJefatura',$id)->whereIn('idCurso',$cursosPorCumplirArreglo)->groupBy('idCurso')->select('idCurso')->get();
        //dd( $cursosPorCumplir,$cursosLlevo);
        $cumpleCursos= count($cursosPorCumplir)==count($cursosLlevo) ? true : false;
        //dd($tiempo_rango);

        // para cadetes toma fecha de ingreso
        $firstDate  = ($jefatura->FechaAscenso and $jefatura->idRango!==12) ? $jefatura->FechaAscenso : $jefatura->FechaIngreso;
        $secondDate = Carbon::now()->format('Y-m-d');;
        $firstDate1 = new DateTime($firstDate);
        $secondDate1 = new DateTime($secondDate);
        $intvl = $firstDate1->diff($secondDate1);
        //dd($firstDate,$secondDate,$intvl->y . " year, " . $intvl->m." months and ".$intvl->d." day");
        $cumpleTiempoAscenso=$this->cumpleTiempo($tiempo_rango->años,$tiempo_rango->meses,$tiempo_rango->dias,$intvl->y,$intvl->m,$intvl->d);
        return view("jefatura.ascender",compact('jefatura','rango','tipo_documentos','cursosPorCumplir','cumpleCursos','cumpleTiempoAscenso','tiempo_rango','rangoActual','firstDate','intvl'));
    }

    public function updaterango(Request $request,$id){
        $jefatura=Jefatura::findOrFail($id);
        $jefatura->idRango = $request->get('idRango');
        $jefatura->FechaAscenso=Carbon::now()->format('Y-m-d');
        $jefatura->update();
        return Redirect::to('jefatura');
    }

    private function cumpleTiempo($y2,$m2,$d2,$y1,$m1,$d1){
        $valor2=$y2*365+$m2*30+$d2; // cumplir
        $valor1=$y1*365+$m1*30+$d1; // tiempo transcurrido
        if($valor1>=$valor2)
            return true;
        else
            return false;

    }
}
