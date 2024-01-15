<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;

use App\Models\Asistencia;
use App\Models\Jefatura;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\AsistenciaFormRequest;
use App\Http\Requests\AsistenciaFormRequest;

use DB;

class AsistenciaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
       return Redirect::to('asistencia/create');
    }
    public function report(Request $request){
        $jefatura=DB::table('jefatura')->get();
        $estado_asistencias=DB::table('estado_asistencia')->get();
        $cursos=DB::table('curso')->get();
        $semestres=DB::table('semestre')->get();

        if ($request){
            $query_idSemestre=trim($request->get('idSemestre'));
            $query_idCurso=trim($request->get('idCurso'));
            $query_Mes=trim($request->get('Mes'));
            
            if($query_Mes!==''){
                $datos=explode("-",$query_Mes);
                $elMes=$this->elMes($query_Mes);
            }else{
                $datos=[];
                $elMes='';
            }
            
            // Si no se colocan filtros no mostrar resultados
            if($query_idCurso=='' and $query_Mes==''){
                $asistencias = Jefatura::where('idJefatura',0)->paginate(10);
            }else{
                $asistenciasMes=Asistencia::where('idCurso',$query_idCurso)->whereYear('fecha',$datos[0])->whereMonth('fecha',$datos[1]);

                //dd($sabado[0],$asistencia1);
                $asistencias=Jefatura::join('matricular','matricular.Documento','=','jefatura.NumeroDocumento')
                    ->leftJoinSub($asistenciasMes, 'asistenciasMes', function ($join) {
                        $join->on('jefatura.idJefatura', '=', 'asistenciasMes.idJefatura');
                    })
                    ->join('curso','curso.idCurso','=','matricular.idCurso')
                    ->where('curso.idCurso',$query_idCurso)
                    ->select('jefatura.idJefatura','jefatura.Nombres','jefatura.Apellidos',
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=1,asistenciasMes.idEstadoAsistencia,NULL)) as d1'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=2,asistenciasMes.idEstadoAsistencia,NULL)) as d2'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=3,asistenciasMes.idEstadoAsistencia,NULL)) as d3'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=4,asistenciasMes.idEstadoAsistencia,NULL)) as d4'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=5,asistenciasMes.idEstadoAsistencia,NULL)) as d5'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=6,asistenciasMes.idEstadoAsistencia,NULL)) as d6'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=7,asistenciasMes.idEstadoAsistencia,NULL)) as d7'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=8,asistenciasMes.idEstadoAsistencia,NULL)) as d8'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=9,asistenciasMes.idEstadoAsistencia,NULL)) as d9'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=10,asistenciasMes.idEstadoAsistencia,NULL)) as d10'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=11,asistenciasMes.idEstadoAsistencia,NULL)) as d11'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=12,asistenciasMes.idEstadoAsistencia,NULL)) as d12'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=13,asistenciasMes.idEstadoAsistencia,NULL)) as d13'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=14,asistenciasMes.idEstadoAsistencia,NULL)) as d14'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=15,asistenciasMes.idEstadoAsistencia,NULL)) as d15'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=16,asistenciasMes.idEstadoAsistencia,NULL)) as d16'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=17,asistenciasMes.idEstadoAsistencia,NULL)) as d17'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=18,asistenciasMes.idEstadoAsistencia,NULL)) as d18'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=19,asistenciasMes.idEstadoAsistencia,NULL)) as d19'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=20,asistenciasMes.idEstadoAsistencia,NULL)) as d20'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=21,asistenciasMes.idEstadoAsistencia,NULL)) as d21'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=22,asistenciasMes.idEstadoAsistencia,NULL)) as d22'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=23,asistenciasMes.idEstadoAsistencia,NULL)) as d23'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=24,asistenciasMes.idEstadoAsistencia,NULL)) as d24'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=25,asistenciasMes.idEstadoAsistencia,NULL)) as d25'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=26,asistenciasMes.idEstadoAsistencia,NULL)) as d26'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=27,asistenciasMes.idEstadoAsistencia,NULL)) as d27'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=28,asistenciasMes.idEstadoAsistencia,NULL)) as d28'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=29,asistenciasMes.idEstadoAsistencia,NULL)) as d29'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=30,asistenciasMes.idEstadoAsistencia,NULL)) as d30'),
                        DB::raw('group_concat(if(day(asistenciasMes.Fecha)=31,asistenciasMes.idEstadoAsistencia,NULL)) as d31'),
                        DB::raw('sum(if(asistenciasMes.idEstadoAsistencia=1,1,0)) as t1'),
                        DB::raw('sum(if(asistenciasMes.idEstadoAsistencia=2,1,0)) as t2'),
                        DB::raw('sum(if(asistenciasMes.idEstadoAsistencia=3,1,0)) as t3'),
                        DB::raw('sum(if(asistenciasMes.idEstadoAsistencia=4,1,0)) as t4') )
                    ->groupBy('jefatura.idJefatura','jefatura.Nombres','jefatura.Apellidos')
                    ->get();
                //dd($asistencias);
            }
            return view('asistencia.report',["asistencias"=>$asistencias,"semestres"=>$semestres,"query_idSemestre"=>$query_idSemestre,"query_Mes"=>$query_Mes,"cursos"=>$cursos,"query_idCurso"=>$query_idCurso,"elMes"=>$elMes,]);
        }
    }
    public function create(Request $request){
		
        $estado_asistencias=DB::table('estado_asistencia')->get();
        $matriculars=DB::table('matricular')->get();
        $cursos=DB::table('curso')->get();
        $semestres=DB::table('semestre')->get();
        if ($request){
            $query_idSemestre=trim($request->get('idSemestre'));
            $query_idCurso=trim($request->get('idCurso'));
            $query_Fecha=trim($request->get('Fecha'));
            $asistencia=Asistencia::where('fecha','=',$query_Fecha);
            // Si no se colocan filtros no mostrar resultados
            if($query_idSemestre=='' and $query_idCurso=='' and $query_Fecha==''){
                $asistencias = Jefatura::where('idJefatura',0)->paginate(10);
            }else{
                $asistencias=Jefatura::join('matricular','matricular.Documento','=','jefatura.NumeroDocumento')
                    ->leftJoinSub($asistencia, 'asistencia', function ($join) {
                        $join->on('jefatura.idJefatura', '=', 'asistencia.idJefatura');
                    })
                    ->join('curso','curso.idCurso','=','matricular.idCurso')
                    ->leftJoin('estado_asistencia','estado_asistencia.idEstadoAsistencia','=','asistencia.idEstadoAsistencia')
                    ->where('curso.idSemestre',$query_idSemestre)
                    ->where('curso.idCurso',$query_idCurso)
                    ->select('asistencia.idAsistencia','jefatura.idJefatura','matricular.idMatricula','jefatura.Nombres','jefatura.Apellidos','asistencia.idEstadoAsistencia','estado_asistencia.EstadoAsistencia')
                    ->paginate(100);
            }
            
            return view('asistencia.create',["asistencias"=>$asistencias,"cursos"=>$cursos,"semestres"=>$semestres,"query_idSemestre"=>$query_idSemestre,"query_idCurso"=>$query_idCurso,"query_Fecha"=>$query_Fecha]);
        }
        // return view("asistencia.create",["estado_asistencias"=>$estado_asistencias,"matriculars"=>$matriculars,"cursos"=>$cursos]);
    }
    public function store(AsistenciaFormRequest $request){
        $idJefatura=$request->get('idJefatura');
        $idMatricula=$request->get('idMatricula');
        $asistencia=$request->get('asistencia');
        $idAsistencia=$request->get('idAsistencia');
        $idCurso=$request->get('idCurso');
        $Fecha = trim($request->get('Fecha'));
        //dd($idJefatura,$idMatricula,$asistencia,$idAsistencia,$Fecha,$idCurso);
        $cantidad = count($asistencia);
        for ($i=0; $i < $cantidad; $i++) { 
            if($idAsistencia[$i]){      // Ya existía la asistencia
                $asis=Asistencia::findOrFail($idAsistencia[$i]);
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
                    default:
                        break;
                }
                $asis->update();
            }else{
                if($asistencia[$i]){
                    $asis =new Asistencia;
                    $asis->Fecha=$request->get('Fecha');
                    $asis->idJefatura=$idJefatura[$i];
                    $asis->idMatricula=$idMatricula[$i];
                    $asis->idCurso=$idCurso;
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
                        default:
                            break;
                    }
                    $asis->save();
                }

            }
        }

        return Redirect::to('asistencia');
    }
    public function show($id){
        
      
    }
    public function edit($id){
        
     
    }
    public function update(AsistenciaFormRequest $request,$id){
        
    }
    public function destroy($id){
        
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
       
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
