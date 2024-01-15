<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Servicio_social;
use App\Models\Asistencia_servicio_social;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

use App\Http\Requests\Asistencia_servicio_socialFormRequest;
use DateTime;
use DB;

class Asistencia_servicio_socialControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        return Redirect::to('asistencia_servicio_social/create');
    }
    public function report(Request $request){
        $servicio_socials=DB::table('servicio_social')->get();
        $estado_asistencias=DB::table('estado_asistencia')->get();
        $pelotons=DB::table('peloton')->get();
        $brigadas=DB::table('brigada')->get();
        $seccionals=DB::table('seccional')->get();
        $colegios=DB::table('colegio')->get();
        $semestres=DB::table('semestre')->get();

        if ($request){
            $query_idSeccional=trim($request->get('idSeccional'));
            $query_idBrigada=trim($request->get('idBrigada'));
            $query_idPeloton=trim($request->get('idPeloton'));
            $query_idColegio=trim($request->get('idColegio'));
            $query_idSemestre=trim($request->get('idSemestre'));
            $query_Mes=trim($request->get('Mes'));
            
            if($query_Mes!==''){
                $datos=explode("-",$query_Mes);
                $sabado=$this->sabados($query_Mes);
                $elMes=$this->elMes($query_Mes);
                //dd($sabado);
            }else{
                $sabado=[];
                $elMes='';
            }
            
            // Si no se colocan filtros no mostrar resultados
            if($query_idSeccional=='' and $query_idBrigada=='' and $query_idPeloton=='' and $query_Mes=='' and $query_idColegio=='' and $query_idSemestre==''){
                $asistencia_servicio_socials = Servicio_social::where('idServicioSocial',0)->paginate(10);
            }else{
                $asistencia1=Asistencia_servicio_social::where('fecha',$sabado[0]);
                $asistencia2=Asistencia_servicio_social::where('fecha',$sabado[1]);
                $asistencia3=Asistencia_servicio_social::where('fecha',$sabado[2]);
                $asistencia4=Asistencia_servicio_social::where('fecha',$sabado[3]);
                if(count($sabado)==5)
                    $asistencia5=Asistencia_servicio_social::where('fecha',$sabado[4]);
                else{
                    $asistencia5=Asistencia_servicio_social::where('fecha','');
                }
                //dd($sabado[0],$asistencia1);
                $asistencia_servicio_socials=Servicio_social::seccional($query_idSeccional)->brigada($query_idBrigada)->peloton($query_idPeloton)->colegio($query_idColegio)->semestre($query_idSemestre)
                    ->leftJoinSub($asistencia1, 'asistencia1', function ($join) {
                        $join->on('servicio_social.idServicioSocial', '=', 'asistencia1.idServicioSocial');
                    })
                    ->leftJoinSub($asistencia2, 'asistencia2', function ($join) {
                        $join->on('servicio_social.idServicioSocial', '=', 'asistencia2.idServicioSocial');
                    })
                    ->leftJoinSub($asistencia3, 'asistencia3', function ($join) {
                        $join->on('servicio_social.idServicioSocial', '=', 'asistencia3.idServicioSocial');
                    })
                    ->leftJoinSub($asistencia4, 'asistencia4', function ($join) {
                        $join->on('servicio_social.idServicioSocial', '=', 'asistencia4.idServicioSocial');
                    })
                    ->leftJoinSub($asistencia5, 'asistencia5', function ($join) {
                        $join->on('servicio_social.idServicioSocial', '=', 'asistencia5.idServicioSocial');
                    })
                    ->select('servicio_social.idServicioSocial','servicio_social.Nombres','servicio_social.Apellidos','asistencia1.idEstadoAsistencia as as1','asistencia2.idEstadoAsistencia as as2','asistencia3.idEstadoAsistencia as as3','asistencia4.idEstadoAsistencia as as4','asistencia5.idEstadoAsistencia as as5')
                    ->get();
                //dd($asistencia_servicio_socials);
            }
            return view('asistencia_servicio_social.report',["asistencia_servicio_socials"=>$asistencia_servicio_socials,"pelotons"=>$pelotons,"brigadas"=>$brigadas,"seccionals"=>$seccionals,"query_idPeloton"=>$query_idPeloton,"query_idColegio"=>$query_idColegio,"query_idSemestre"=>$query_idSemestre,"query_idSeccional"=>$query_idSeccional,"query_idBrigada"=>$query_idBrigada,"query_Mes"=>$query_Mes,"elMes"=>$elMes,"sabado"=>$sabado,'colegios'=>$colegios,"semestres"=>$semestres]);
        }
    }
    public function create(Request $request){
		
        $servicio_socials=DB::table('servicio_social')->get();
        $estado_asistencias=DB::table('estado_asistencia')->get();
        $pelotons=DB::table('peloton')->get();
        $brigadas=DB::table('brigada')->get();
        $seccionals=DB::table('seccional')->get();
        $colegios=DB::table('colegio')->get();
        $semestres=DB::table('semestre')->get();

        if ($request){
            $query_idSeccional=trim($request->get('idSeccional'));
            $query_idBrigada=trim($request->get('idBrigada'));
            $query_idPeloton=trim($request->get('idPeloton'));
            $query_idColegio=trim($request->get('idColegio'));
            $query_idSemestre=trim($request->get('idSemestre'));
            $query_Fecha=trim($request->get('Fecha'));
            $asistencia=Asistencia_servicio_social::where('fecha','=',$query_Fecha);
            // Si no se colocan filtros no mostrar resultados
            if($query_idSeccional=='' and $query_idBrigada=='' and $query_idPeloton=='' and $query_Fecha=='' and $query_idColegio==''){
                $asistencia_servicio_socials = Servicio_social::where('idServicioSocial',0)->paginate(10);
            }else{
                $asistencia_servicio_socials=Servicio_social::seccional($query_idSeccional)->brigada($query_idBrigada)->peloton($query_idPeloton)->colegio($query_idColegio)->semestre($query_idSemestre)
                    ->leftJoinSub($asistencia, 'asistencia', function ($join) {
                        $join->on('servicio_social.idServicioSocial', '=', 'asistencia.idServicioSocial');
                    })
                    ->leftJoin('estado_asistencia','estado_asistencia.idEstadoAsistencia','=','asistencia.idEstadoAsistencia')
                    ->select('asistencia.idAsistencia','servicio_social.idServicioSocial','servicio_social.Nombres','servicio_social.Apellidos','asistencia.idEstadoAsistencia','estado_asistencia.EstadoAsistencia')
                    ->paginate(100);
            }
            return view('asistencia_servicio_social.create',["asistencia_servicio_socials"=>$asistencia_servicio_socials,"pelotons"=>$pelotons,"brigadas"=>$brigadas,"seccionals"=>$seccionals,"query_idPeloton"=>$query_idPeloton,"query_idSeccional"=>$query_idSeccional,"query_idColegio"=>$query_idColegio,"query_idSemestre"=>$query_idSemestre,"query_idBrigada"=>$query_idBrigada,"query_Fecha"=>$query_Fecha,'colegios'=>$colegios,"semestres"=>$semestres]);
        }

        return view("asistencia_servicio_social.create",["servicio_socials"=>$servicio_socials,"estado_asistencias"=>$estado_asistencias,"pelotons"=>$pelotons,"brigadas"=>$brigadas,"seccionals"=>$seccionals,'colegios'=>$colegios,"semestres"=>$semestres]);
    }
    public function store(Asistencia_servicio_socialFormRequest $request){
        $idServicioSocial=$request->get('idServicioSocial');
        $asistencia=$request->get('asistencia');
        $idAsistencia=$request->get('idAsistencia');
        $Fecha = trim($request->get('Fecha'));
        //dd($idServicioSocial,$asistencia,$idAsistencia,$Fecha);
        $cantidad = count($asistencia);
        for ($i=0; $i < $cantidad; $i++) { 
            if($idAsistencia[$i]){      // Ya existía la asistencia
                $asis=Asistencia_servicio_social::findOrFail($idAsistencia[$i]);
                switch ($asistencia[$i]) {
                    case 'Presente':
                        $asis->idEstadoAsistencia=1;
                        break;
                    case 'Ausente':
                        $asis->idEstadoAsistencia=2;
                        break;
                    case 'Tarde':
                        $asis->idEstadoAsistencia=3;
                        break;
                    case 'Licencia':
                        $asis->idEstadoAsistencia=4;
                        break;
                    case '':
                        $asis->delete();  // Borrar
                        break;
                    default:
                        break;
                }
                $asis->update();
            }else{
                if($asistencia[$i]){
                    $asis =new Asistencia_servicio_social;
                    $asis->Fecha=$request->get('Fecha');
                    $asis->idServicioSocial=$idServicioSocial[$i];

                    switch ($asistencia[$i]) {
                        case 'Presente':
                            $asis->idEstadoAsistencia=1;
                            break;
                        case 'Ausente':
                            $asis->idEstadoAsistencia=2;
                            break;
                        case 'Tarde':
                            $asis->idEstadoAsistencia=3;
                            break;
                        case 'Licencia':
                            $asis->idEstadoAsistencia=4;
                            break;
                         case '':  //No hacer nada
                            break;
                        default:
                            break;
                    }
                    $asis->save();
                }

            }
        }

        return Redirect::to('asistencia_servicio_social');
    }
    public function show($id){
        
    }
    public function edit($id){
        

    }
    public function update(Asistencia_servicio_socialFormRequest $request,$id){
        
    }
    public function destroy($id){
        
    }
	
	public function inactivar($id)
    {
        
    }
   
    public   function sabados($query_Mes){
        $fechaInicio=$query_Mes.'-01';
        $fechaFin=$query_Mes.'-31';

        $dias=array(); //creo un arreglo para devolver los sabados
        $fecha1=date($fechaInicio);
        $fecha2=date($fechaFin);
        $fecha=date("Y-m-d",strtotime($fecha1)); //paso a date para darle formato
        $fechaTime=strtotime($fecha1."- 1 days"); //paso a hora unix fechaInicio
        $i=0;
        while($fecha <= $fecha2){ //verifico que no me haya pasado de la fecha fin
            //Ahora, el Unix timestamp para el primer domingo
            //después de fecha 1:
            $proximo_domingo=strtotime("next Sunday",$fechaTime);
            $proximo_sabado=strtotime("next Saturday",$fechaTime);

            $fechaSabado=date("Y-m-d",$proximo_sabado);

            if($fechaSabado <= $fechaFin){ 
                $dias[$i]=$fechaSabado;
                $i++;
            }else{
                break;
            }
            $fechaTime=$proximo_domingo;
            $fecha=date("Y-m-d",$proximo_domingo);
        }
        return $dias;
    }

    public function elMes($query_mes){

        $mes = substr($query_mes,-2);
        $anno = substr($query_mes,0,4);
        switch($mes){   
            case '01':
                $nombreMes = "Enero";
                break;
            case '02':
                $nombreMes = "Febrero";
                break;
            case '03':
                $nombreMes = "Marzo";
                break;
            case '04':
                $nombreMes = "Abril";
                break;
            case '05':
                $nombreMes = "Mayo";
                break;
            case '06':
                $nombreMes = "Junio";
                break;
            case '07':
                $nombreMes = "Julio";
                break;
            case '08':
                $nombreMes = "Agosto";
                break;
            case '09':
                $nombreMes = "Setiembre";
                break;
            case '10':
                $nombreMes = "Octubre";
                break;
            case '11':
                $nombreMes = "Noviembre";
                break;
            case '12':
                $nombreMes = "Diciembre";
                break;
        }

        return($nombreMes.'-'.$anno);
    }
}
