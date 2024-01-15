<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Instructoresxcurso;
use App\Models\Instructoresxcurso;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\InstructoresxcursoFormRequest;
use App\Http\Requests\InstructoresxcursoFormRequest;

use DB;

class InstructoresxcursoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $instructoresxcursos=DB::table('instructoresxcurso')
            ->join('curso','instructoresxcurso.idCurso','=','curso.idCurso')
            ->join('instructor','instructoresxcurso.idinstructor','=','instructor.idinstructor')
            ->select('instructoresxcurso.idInstructoresxCurso','curso.NombreCurso as curso','instructor.Nombres as instructor','instructor.Apellidos as instructor')->paginate(10);
            return view('instructoresxcurso.index',["instructoresxcursos"=>$instructoresxcursos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $instructoresxcursos=DB::table('instructoresxcurso')
            ->join('curso','instructoresxcurso.idCurso','=','curso.idCurso')
            ->join('instructor','instructoresxcurso.idinstructor','=','instructor.idinstructor')
            ->select('instructoresxcurso.idInstructoresxCurso','curso.NombreCurso as curso','instructor.Nombres as instructor','instructor.Apellidos as instructor')->paginate(1000);
            return view('instructoresxcurso.report',["instructoresxcursos"=>$instructoresxcursos]);
        }
    }
    public function create(){
		
        $cursos=DB::table('curso')->get();
        $instructors=DB::table('instructor')->get();
        return view("instructoresxcurso.create",["cursos"=>$cursos,"instructors"=>$instructors]);
    }
    public function store (InstructoresxcursoFormRequest $request){
        $instructoresxcurso=new Instructoresxcurso;
        
        $instructoresxcurso->idinstructor=$request->get('idinstructor');
        $instructoresxcurso->idCurso=$request->get('idCurso');
        $instructoresxcurso->save();
        return Redirect::to('instructoresxcurso');
    }
    public function show($id){
        
        $cursos=DB::table('curso')->get();
        $instructors=DB::table('instructor')->get();
        return view("instructoresxcurso.show",["instructoresxcurso"=>instructoresxcurso::findOrFail($id),"cursos"=>$cursos,"instructors"=>$instructors]);
    }
    public function edit($id){
        
        $cursos=DB::table('curso')->get();
        $instructors=DB::table('instructor')->get();
        return view("instructoresxcurso.edit",["instructoresxcurso"=>instructoresxcurso::findOrFail($id),"cursos"=>$cursos,"instructors"=>$instructors]);
    }
    public function update(InstructoresxcursoFormRequest $request,$id){
        $instructoresxcurso=Instructoresxcurso::findOrFail($id);
		
        $instructoresxcurso->idinstructor = $request->get('idinstructor');
        $instructoresxcurso->idCurso = $request->get('idCurso');
        $instructoresxcurso->update();
        return Redirect::to('instructoresxcurso');
    }
    public function destroy($id){
        $instructoresxcurso=Instructoresxcurso::findOrFail($id);
        $instructoresxcurso->delete();
        return Redirect::to('instructoresxcurso');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$instructoresxcurso=Instructoresxcurso::findOrFail($id);
		//instructoresxcurso->estado='Inactivo';
        //$instructoresxcurso->update();
        //return Redirect::to('instructoresxcurso');
    }
}
