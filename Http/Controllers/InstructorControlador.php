<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Instructor;
use App\Models\Instructor;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\InstructorFormRequest;
use App\Http\Requests\InstructorFormRequest;

use DB;

class InstructorControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $instructors=DB::table('instructor')
            ->join('estado','instructor.idEstado','=','estado.idEstado')
            ->select('instructor.idinstructor','instructor.Documento','instructor.Nombres','instructor.Apellidos','instructor.Correo','instructor.Telefono','estado.Estado as estado')->paginate(10);
            return view('instructor.index',["instructors"=>$instructors,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $instructors=DB::table('instructor')
            ->join('estado','instructor.idEstado','=','estado.idEstado')
            ->select('instructor.idinstructor','instructor.Documento','instructor.Nombres','instructor.Apellidos','instructor.Correo','instructor.Telefono','estado.Estado as estado')->paginate(1000);
            return view('instructor.report',["instructors"=>$instructors]);
        }
    }
    public function create(){
		
        $estados=DB::table('estado')->get();
        return view("instructor.create",["estados"=>$estados]);
    }
    public function store (InstructorFormRequest $request){
        $instructor=new Instructor;
        
        $instructor->Documento=$request->get('Documento');
        $instructor->Nombres=$request->get('Nombres');
        $instructor->Apellidos=$request->get('Apellidos');
        $instructor->Correo=$request->get('Correo');
        $instructor->Telefono=$request->get('Telefono');
        $instructor->idEstado=$request->get('idEstado');
        $instructor->save();
        return Redirect::to('instructor');
    }
    public function show($id){
        
        $estados=DB::table('estado')->get();
        return view("instructor.show",["instructor"=>instructor::findOrFail($id),"estados"=>$estados]);
    }
    public function edit($id){
        
        $estados=DB::table('estado')->get();
        return view("instructor.edit",["instructor"=>instructor::findOrFail($id),"estados"=>$estados]);
    }
    public function update(InstructorFormRequest $request,$id){
        $instructor=Instructor::findOrFail($id);
		
        $instructor->Documento = $request->get('Documento');
        $instructor->Nombres = $request->get('Nombres');
        $instructor->Apellidos = $request->get('Apellidos');
        $instructor->Correo = $request->get('Correo');
        $instructor->Telefono = $request->get('Telefono');
        $instructor->idEstado = $request->get('idEstado');
        $instructor->update();
        return Redirect::to('instructor');
    }
    public function destroy($id){
        $instructor=Instructor::findOrFail($id);
        $instructor->delete();
        return Redirect::to('instructor');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$instructor=Instructor::findOrFail($id);
		//instructor->estado='Inactivo';
        //$instructor->update();
        //return Redirect::to('instructor');
    }
}
