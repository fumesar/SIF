<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Asignatura;
use App\Models\Asignatura;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\AsignaturaFormRequest;
use App\Http\Requests\AsignaturaFormRequest;

use DB;

class AsignaturaControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $asignaturas=DB::table('asignatura')
            ->join('curso','asignatura.idCurso','=','curso.idCurso')
            ->join('estado','asignatura.idEstado','=','estado.idEstado')
            ->join('instructor','asignatura.idinstructor','=','instructor.idinstructor')
            ->select('asignatura.idAsignatura','asignatura.NombreAsignatura','curso.NombreCurso as curso','estado.Estado as estado','instructor.Nombres as instructor','instructor.Apellidos as instructor')->paginate(10);
            return view('asignatura.index',["asignaturas"=>$asignaturas,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $asignaturas=DB::table('asignatura')
            ->join('curso','asignatura.idCurso','=','curso.idCurso')
            ->join('estado','asignatura.idEstado','=','estado.idEstado')
            ->join('instructor','asignatura.idinstructor','=','instructor.idinstructor')
            ->select('asignatura.idAsignatura','asignatura.NombreAsignatura','curso.NombreCurso as curso','estado.Estado as estado','instructor.Nombres as instructor','instructor.Apellidos as instructor')->paginate(1000);
            return view('asignatura.report',["asignaturas"=>$asignaturas]);
        }
    }
    public function create(){
		
        $cursos=DB::table('curso')->get();
        $estados=DB::table('estado')->get();
        $instructors=DB::table('instructor')->get();
        return view("asignatura.create",["cursos"=>$cursos,"estados"=>$estados,"instructors"=>$instructors]);
    }
    public function store (AsignaturaFormRequest $request){
        $asignatura=new Asignatura;
        
        $asignatura->NombreAsignatura=$request->get('NombreAsignatura');
        $asignatura->idCurso=$request->get('idCurso');
        $asignatura->idinstructor=$request->get('idinstructor');
        $asignatura->idEstado=$request->get('idEstado');
        $asignatura->save();
        return Redirect::to('asignatura');
    }
    public function show($id){
        
        $cursos=DB::table('curso')->get();
        $estados=DB::table('estado')->get();
        $instructors=DB::table('instructor')->get();
        return view("asignatura.show",["asignatura"=>asignatura::findOrFail($id),"cursos"=>$cursos,"estados"=>$estados,"instructors"=>$instructors]);
    }
    public function edit($id){
        
        $cursos=DB::table('curso')->get();
        $estados=DB::table('estado')->get();
        $instructors=DB::table('instructor')->get();
        return view("asignatura.edit",["asignatura"=>asignatura::findOrFail($id),"cursos"=>$cursos,"estados"=>$estados,"instructors"=>$instructors]);
    }
    public function update(AsignaturaFormRequest $request,$id){
        $asignatura=Asignatura::findOrFail($id);
		
        $asignatura->NombreAsignatura = $request->get('NombreAsignatura');
        $asignatura->idCurso = $request->get('idCurso');
        $asignatura->idinstructor = $request->get('idinstructor');
        $asignatura->idEstado = $request->get('idEstado');
        $asignatura->update();
        return Redirect::to('asignatura');
    }
    public function destroy($id){
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->delete();
        return Redirect::to('asignatura');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$asignatura=Asignatura::findOrFail($id);
		//asignatura->estado='Inactivo';
        //$asignatura->update();
        //return Redirect::to('asignatura');
    }
}
