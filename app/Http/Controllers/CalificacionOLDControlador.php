<?php

//namespace Fumesar\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Fumesar\Http\Requests;
use App\Http\Requests;

//use Fumesar\Calificacion;
use App\Models\Calificacion;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use Fumesar\Http\Requests\CalificacionFormRequest;
use App\Http\Requests\CalificacionFormRequest;

use DB;

class CalificacionControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        return Redirect::to('calificacion/create');
    }
    public function report(Request $request){
        
        $cursos=DB::table('curso')->get();
        $semestres=DB::table('semestre')->get();
        if ($request){
            $query_idSemestre=trim($request->get('idSemestre'));
            $query_idCurso=trim($request->get('idCurso'));
            $query_NombreCurso=[''];
            $asignaturas=[];
            if($query_idCurso){
                $asignaturas=DB::table('asignatura')
                    ->where('idCurso',$query_idCurso)
                    ->get();
                //dd($asignaturas);
                $query_NombreCurso=DB::table('curso')
                    ->where('idCurso',$query_idCurso)
                    ->pluck('NombreCurso');
            }
            //Solo soporta hasta 5 asignaturas por curso
            $cal1=[];$cal=[];$cal3=[];
            $asig1 = ($asignaturas) ? $asignaturas[0]->idAsignatura : 0;
            $asig2 = (count($asignaturas)>=2) ? $asignaturas[1]->idAsignatura : 0;
            $asig3 = (count($asignaturas)>=3) ? $asignaturas[2]->idAsignatura : 0;
            $asig4 = (count($asignaturas)>=4) ? $asignaturas[3]->idAsignatura : 0;
            $asig5 = (count($asignaturas)>=5) ? $asignaturas[4]->idAsignatura : 0;

            $cal1=Calificacion::where('idSemestre',$query_idSemestre)->where('idCurso',$query_idCurso)
                ->where('idAsignatura',$asig1);
            $cal2=Calificacion::where('idSemestre',$query_idSemestre)->where('idCurso',$query_idCurso)
                ->where('idAsignatura',$asig2);
            $cal3=Calificacion::where('idSemestre',$query_idSemestre)->where('idCurso',$query_idCurso)
                ->where('idAsignatura',$asig3);
            $cal4=Calificacion::where('idSemestre',$query_idSemestre)->where('idCurso',$query_idCurso)
                ->where('idAsignatura',$asig4);
            $cal5=Calificacion::where('idSemestre',$query_idSemestre)->where('idCurso',$query_idCurso)
                ->where('idAsignatura',$asig5);

            $calificacions=DB::table('matricular')

                ->select('cal1.idCalificacion','matricular.idMatricula as idMatricula','jefatura.idJefatura','matricular.Documento','matricular.Nombres as Nombres','matricular.Apellidos as Apellidos','cal1.Nota as Nota1','cal2.Nota as Nota2','cal3.Nota as Nota3','cal4.Nota as Nota4','cal5.Nota as Nota5')
                 ->join('jefatura','jefatura.NumeroDocumento','=','matricular.Documento')
                 
                 ->leftJoinSub($cal1,'cal1',function($join){
                      $join->on('cal1.idJefatura','=','jefatura.idJefatura');
                 })
                 ->leftJoinSub($cal2,'cal2',function($join){
                      $join->on('cal2.idJefatura','=','jefatura.idJefatura');
                 })
                  ->leftJoinSub($cal3,'cal3',function($join){
                      $join->on('cal3.idJefatura','=','jefatura.idJefatura');
                 })
                 ->leftJoinSub($cal4,'cal4',function($join){
                      $join->on('cal4.idJefatura','=','jefatura.idJefatura');
                 })
                 ->leftJoinSub($cal5,'cal5',function($join){
                      $join->on('cal5.idJefatura','=','jefatura.idJefatura');
                 })
                 ->where('matricular.idSemestre','=',$query_idSemestre)
                 ->where('matricular.idCurso','=',$query_idCurso)
                 ->orderBy('matricular.Apellidos')
                 ->paginate(1000);
            return view("calificacion.report",["calificacions"=>$calificacions,"asignaturas"=>$asignaturas,"cursos"=>$cursos,"semestres"=>$semestres,"query_idSemestre"=>$query_idSemestre,"query_idCurso"=>$query_idCurso,"query_NombreCurso"=>$query_NombreCurso]);
        }
    }
    public function create(Request $request){
        $asignaturas=DB::table('asignatura')->get();
        $cursos=DB::table('curso')->get();
        $semestres=DB::table('semestre')->get();
        // $query_idSemestre=0;
        // $query_idCurso=0;
        // $query_idAsignatura=0;
		if ($request){
            $query_idSemestre=trim($request->get('idSemestre'));
            $query_idCurso=trim($request->get('idCurso'));
            $query_idAsignatura=trim($request->get('idAsignatura'));
            
            $calificacions=DB::table('matricular')
            ->select('calificacion.idCalificacion','matricular.idMatricula as idMatricula','jefatura.idJefatura','matricular.Documento','matricular.Nombres as Nombres','matricular.Apellidos as Apellidos','calificacion.Nota as Nota','calificacion.Promedio as Promedio')
             ->join('jefatura','jefatura.NumeroDocumento','=','matricular.Documento')
             ->join('asignatura','asignatura.idCurso','=','matricular.idCurso')
             ->leftJoin('calificacion',function($join){
                  $join->on('calificacion.idSemestre','=','matricular.idSemestre')
                  ->on('calificacion.idCurso','=','matricular.idCurso')
                  ->on('calificacion.idAsignatura','=','asignatura.idAsignatura')
                  ->on('calificacion.idJefatura','=','jefatura.idJefatura');
             })
             ->where('matricular.idSemestre','=',$query_idSemestre)
             ->where('matricular.idCurso','=',$query_idCurso)
             ->where('asignatura.idAsignatura','=',$query_idAsignatura)
             ->orderBy('matricular.Apellidos')
             ->paginate(1000);
            return view("calificacion.create",["calificacions"=>$calificacions,"asignaturas"=>$asignaturas,"cursos"=>$cursos,"semestres"=>$semestres,"query_idSemestre"=>$query_idSemestre,"query_idCurso"=>$query_idCurso,"query_idAsignatura"=>$query_idAsignatura]);
        }
    }
    public function store (CalificacionFormRequest $request){
        //dd($request->get('notas'),$request->get('documentos'));
        $jefaturas=$request->get('jefaturas');
        $notas=$request->get('notas');
        $calificacion=new Calificacion;
        $calificacion->idSemestre=$request->get('idSemestre');
        $calificacion->idCurso=$request->get('idCurso');
        $calificacion->idAsignatura=$request->get('idAsignatura');
        //$calificacion->idJefatura=1; //$request->get('idJefatura');
        //$calificacion->Nota=4; //$request->get('Nota');
        //$calificacion->Promedio=4; //=$request->get('Promedio');

        $cantidad = count($jefaturas);
        for ($i=0; $i < $cantidad; $i++) {
            DB::table('calificacion')
                ->updateOrInsert(
                    ['idSemestre' => $calificacion->idSemestre, 
                     'idCurso' => $calificacion->idCurso,
                     'idAsignatura' => $calificacion->idAsignatura,
                     'idJefatura' => $jefaturas[$i]
                    ],
                    ['Nota' =>  $notas[$i],
                     'Promedio' => $notas[$i]
                    ]
                );
        }
        return Redirect::to('calificacion');
    }
    public function show($id){
        
        $asignaturas=DB::table('asignatura')->get();
        $cursos=DB::table('curso')->get();
        $semestres=DB::table('semestre')->get();
        $jefaturas=DB::table('jefatura')->get();
        return view("calificacion.show",["calificacion"=>calificacion::findOrFail($id),"asignaturas"=>$asignaturas,"cursos"=>$cursos,"semestres"=>$semestres,"jefaturas"=>$jefaturas]);
    }
    public function edit($id){
        $asignaturas=DB::table('asignatura')->get();
        $cursos=DB::table('curso')->get();
        $semestres=DB::table('semestre')->get();
        $jefaturas=DB::table('jefatura')->get();
        return view("calificacion.edit",["calificacion"=>calificacion::findOrFail($id),"asignaturas"=>$asignaturas,"cursos"=>$cursos,"semestres"=>$semestres,"jefaturas"=>$jefaturas]);
    }
    public function update(CalificacionFormRequest $request,$id){
        $calificacion=Calificacion::findOrFail($id);
		
        $calificacion->idSemestre = $request->get('idSemestre');
        $calificacion->idCurso = $request->get('idCurso');
        $calificacion->idAsignatura = $request->get('idAsignatura');
        $calificacion->idJefatura = $request->get('idJefatura');
        $calificacion->Nota = $request->get('Nota');
        $calificacion->Promedio = $request->get('Promedio');
        $calificacion->update();
        return Redirect::to('calificacion');
    }
    public function destroy($id){
        $calificacion=Calificacion::findOrFail($id);
        $calificacion->delete();
        return Redirect::to('calificacion');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$calificacion=Calificacion::findOrFail($id);
		//calificacion->estado='Inactivo';
        //$calificacion->update();
        //return Redirect::to('calificacion');
    }

}
