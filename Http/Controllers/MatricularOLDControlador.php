<?php

//namespace Fumesar\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Fumesar\Http\Requests;
use App\Http\Requests;

//use Fumesar\Matricular;
use App\Models\Matricular;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use Fumesar\Http\Requests\MatricularFormRequest;
use App\Http\Requests\MatricularFormRequest;

use DB;

class MatricularControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $matriculars=DB::table('matricular')
            ->join('curso','matricular.idCurso','=','curso.idCurso')
            ->join('estado_matricula','matricular.idEstadoMatricula','=','estado_matricula.idEstadoMatricula')
            ->join('semestre','matricular.idSemestre','=','semestre.idSemestre')
            ->select('matricular.idMatricula','matricular.Documento','matricular.Nombres','matricular.Apellidos','curso.NombreCurso as curso','estado_matricula.EstadoMatricula as estado_matricula','semestre.Semestre as semestre')->paginate(10);
            return view('matricular.index',["matriculars"=>$matriculars,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $matriculars=DB::table('matricular')
            ->join('curso','matricular.idCurso','=','curso.idCurso')
            ->join('estado_matricula','matricular.idEstadoMatricula','=','estado_matricula.idEstadoMatricula')
            ->join('semestre','matricular.idSemestre','=','semestre.idSemestre')
            ->select('matricular.idMatricula','matricular.Documento','matricular.Nombres','matricular.Apellidos','curso.NombreCurso as curso','estado_matricula.EstadoMatricula as estado_matricula','semestre.Semestre as semestre')->paginate(1000);
            return view('matricular.report',["matriculars"=>$matriculars]);
        }
    }
    public function create(){
		
        $cursos=DB::table('curso')->get();
        $estado_matriculas=DB::table('estado_matricula')->get();
        $semestres=DB::table('semestre')->get();
        return view("matricular.create",["cursos"=>$cursos,"estado_matriculas"=>$estado_matriculas,"semestres"=>$semestres]);
    }
    public function store (MatricularFormRequest $request){
        $matricular=new Matricular;
        
        $matricular->idSemestre=$request->get('idSemestre');
        $matricular->Documento=$request->get('Documento');
        $matricular->Nombres=$request->get('Nombres');
        $matricular->Apellidos=$request->get('Apellidos');
        $matricular->idCurso=$request->get('idCurso');
        $matricular->idEstadoMatricula=$request->get('idEstadoMatricula');
        $matricular->save();
        return Redirect::to('matricular');
    }
    public function show($id){
        
        $cursos=DB::table('curso')->get();
        $estado_matriculas=DB::table('estado_matricula')->get();
        $semestres=DB::table('semestre')->get();
        return view("matricular.show",["matricular"=>matricular::findOrFail($id),"cursos"=>$cursos,"estado_matriculas"=>$estado_matriculas,"semestres"=>$semestres]);
    }
    public function edit($id){
        
        $cursos=DB::table('curso')->get();
        $estado_matriculas=DB::table('estado_matricula')->get();
        $semestres=DB::table('semestre')->get();
        return view("matricular.edit",["matricular"=>matricular::findOrFail($id),"cursos"=>$cursos,"estado_matriculas"=>$estado_matriculas,"semestres"=>$semestres]);
    }
    public function update(MatricularFormRequest $request,$id){
        $matricular=Matricular::findOrFail($id);
		
        $matricular->idSemestre = $request->get('idSemestre');
        $matricular->Documento = $request->get('Documento');
        $matricular->Nombres = $request->get('Nombres');
        $matricular->Apellidos = $request->get('Apellidos');
        $matricular->idCurso = $request->get('idCurso');
        $matricular->idEstadoMatricula = $request->get('idEstadoMatricula');
        $matricular->update();
        return Redirect::to('matricular');
    }
    public function destroy($id){
        $matricular=Matricular::findOrFail($id);
        $matricular->delete();
        return Redirect::to('matricular');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$matricular=Matricular::findOrFail($id);
		//matricular->estado='Inactivo';
        //$matricular->update();
        //return Redirect::to('matricular');
    }
}
