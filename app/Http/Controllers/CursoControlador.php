<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Curso;
use App\Models\Curso;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\CursoFormRequest;
use App\Http\Requests\CursoFormRequest;

use DB;

class CursoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $matriculados=DB::table('matricular')
                ->select('idSemestre','idCurso',DB::raw('count(*) as conteo'))
                ->where('idEstadoMatricula',1)
                ->groupBy('matricular.idSemestre','matricular.idCurso');
            //dd($matriculados);
            $cursos=DB::table('curso')
                ->join('estado','curso.idEstado','=','estado.idEstado')
                ->join('semestre','curso.idSemestre','=','semestre.idSemestre')
                ->leftJoinSub($matriculados,'matriculados', function($join){
                    $join->on('curso.idSemestre','=','matriculados.idSemestre')
                        ->on('curso.idCurso','=','matriculados.idCurso');
                })
                ->select('curso.idCurso','curso.NombreCurso','estado.Estado as estado','semestre.Semestre as Semestre','curso.idSemestre','matriculados.idSemestre as midSemestre','matriculados.idCurso as midCurso','matriculados.conteo')
                ->paginate(10);
            //dd($cursos);
            return view('curso.index',["cursos"=>$cursos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $cursos=DB::table('curso')
            ->join('estado','curso.idEstado','=','estado.idEstado')
            ->select('curso.idCurso','curso.NombreCurso','estado.Estado as estado')->paginate(1000);
            return view('curso.report',["cursos"=>$cursos]);
        }
    }
    public function create(){
		$semestres=DB::table('semestre')->get();
        $estados=DB::table('estado')->get();
        return view("curso.create",["estados"=>$estados,"semestres"=>$semestres]);
    }
    public function store (CursoFormRequest $request){
        $curso=new Curso;
        $curso->idSemestre=$request->get('idSemestre');
        $curso->NombreCurso=$request->get('NombreCurso');
        $curso->idEstado=$request->get('idEstado');
        $curso->save();
        return Redirect::to('curso');
    }
    public function show($id){
        $semestres=DB::table('semestre')->get();
        $estados=DB::table('estado')->get();
        return view("curso.show",["curso"=>curso::findOrFail($id),"estados"=>$estados,"semestres"=>$semestres]);
    }
    public function edit($id){
        $semestres=DB::table('semestre')->get();
        $estados=DB::table('estado')->get();
        return view("curso.edit",["curso"=>curso::findOrFail($id),"estados"=>$estados,"semestres"=>$semestres]);
    }
    public function update(CursoFormRequest $request,$id){
        $curso=Curso::findOrFail($id);
		$curso->idSemestre=$request->get('idSemestre');
        $curso->NombreCurso = $request->get('NombreCurso');
        $curso->idEstado = $request->get('idEstado');
        $curso->update();
        return Redirect::to('curso');
    }
    public function destroy($id){
        $curso=Curso::findOrFail($id);
        $curso->delete();
        return Redirect::to('curso');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$curso=Curso::findOrFail($id);
		//curso->estado='Inactivo';
        //$curso->update();
        //return Redirect::to('curso');
    }
}
