<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Matricula;
use App\Models\Matricula;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\MatriculaFormRequest;
use App\Http\Requests\MatriculaFormRequest;

use DB;

class MatriculaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $matriculas=DB::table('matricula')
            ->join('curso','matricula.idCurso','=','curso.idCurso')
            ->join('estadomatricula','matricula.idEstadoMatricula','=','estadomatricula.idEstadoMatricula')
            ->join('semestre','matricula.idSemestre','=','semestre.idSemestre')
            ->select('matricula.idMatricula','matricula.Documento','matricula.Nombres','matricula.Apellidos','curso.NombreCurso as curso','estadomatricula.EstadoMatricula as estadomatricula','semestre.Semestre as semestre')->paginate(10);
            return view('matricula.index',["matriculas"=>$matriculas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $matriculas=DB::table('matricula')
            ->join('curso','matricula.idCurso','=','curso.idCurso')
            ->join('estadomatricula','matricula.idEstadoMatricula','=','estadomatricula.idEstadoMatricula')
            ->join('semestre','matricula.idSemestre','=','semestre.idSemestre')
            ->select('matricula.idMatricula','matricula.Documento','matricula.Nombres','matricula.Apellidos','curso.NombreCurso as curso','estadomatricula.EstadoMatricula as estadomatricula','semestre.Semestre as semestre')->paginate(1000);
            return view('matricula.report',["matriculas"=>$matriculas]);
        }
    }
    public function create(){
		
        $cursos=DB::table('curso')->get();

        $estadomatriculas=DB::table('estadomatricula')->get();

        $semestres=DB::table('semestre')->get();

        return view("matricula.create",["cursos"=>$cursos,"estadomatriculas"=>$estadomatriculas,"semestres"=>$semestres]);
    }
    public function store (MatriculaFormRequest $request){
        $matricula=new Matricula;
        
		$matricula->idSemestre=$request->get('idSemestre');

		$matricula->Documento=$request->get('Documento');

		$matricula->Nombres=$request->get('Nombres');

		$matricula->Apellidos=$request->get('Apellidos');

		$matricula->idCurso=$request->get('idCurso');

		$matricula->idEstadoMatricula=$request->get('idEstadoMatricula');

        $matricula->save();
        return Redirect::to('matricula');
    }
    public function show($id){
        return view("matricula.show",["matricula"=>matricula::findOrFail($id)]);
    }
    public function edit($id){
        
        $cursos=DB::table('curso')->get();

        $estadomatriculas=DB::table('estadomatricula')->get();

        $semestres=DB::table('semestre')->get();

        return view("matricula.edit",["matricula"=>matricula::findOrFail($id),"cursos"=>$cursos,"estadomatriculas"=>$estadomatriculas,"semestres"=>$semestres]);
    }
    public function update(MatriculaFormRequest $request,$id){
        $matricula=Matricula::findOrFail($id);
		
        $matricula->idSemestre=$request->get('idSemestre');

        $matricula->Documento=$request->get('Documento');

        $matricula->Nombres=$request->get('Nombres');

        $matricula->Apellidos=$request->get('Apellidos');

        $matricula->idCurso=$request->get('idCurso');

        $matricula->idEstadoMatricula=$request->get('idEstadoMatricula');

        $matricula->update();
        return Redirect::to('matricula');
    }
    public function destroy($id){
        $matricula=Matricula::findOrFail($id);
        $matricula->delete();
        return Redirect::to('matricula');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$matricula=Matricula::findOrFail($id);
		//matricula->estado='Inactivo';
        //$matricula->update();
        //return Redirect::to('matricula');
    }
}
