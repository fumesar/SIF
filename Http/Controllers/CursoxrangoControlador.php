<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Cursoxrango;
use App\Models\Cursoxrango;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\CursoxrangoFormRequest;
use App\Http\Requests\CursoxrangoFormRequest;

use DB;

class CursoxrangoControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $cursoxrangos=DB::table('cursoxrango')
            ->join('curso','cursoxrango.idCurso','=','curso.idCurso')
            ->join('rango','cursoxrango.idRango','=','rango.idRango')
            ->select('cursoxrango.idCursoxRango','curso.NombreCurso as curso','rango.Rango as rango')->paginate(10);
            return view('cursoxrango.index',["cursoxrangos"=>$cursoxrangos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $cursoxrangos=DB::table('cursoxrango')
            ->join('curso','cursoxrango.idCurso','=','curso.idCurso')
            ->join('rango','cursoxrango.idRango','=','rango.idRango')
            ->select('cursoxrango.idCursoxRango','curso.NombreCurso as curso','rango.Rango as rango')->paginate(1000);
            return view('cursoxrango.report',["cursoxrangos"=>$cursoxrangos]);
        }
    }
    public function create(){
		
        $cursos=DB::table('curso')->get();
        $rangos=DB::table('rango')->get();
        return view("cursoxrango.create",["cursos"=>$cursos,"rangos"=>$rangos]);
    }
    public function store (CursoxrangoFormRequest $request){
        $cursoxrango=new Cursoxrango;
        
        $cursoxrango->idRango=$request->get('idRango');
        $cursoxrango->idCurso=$request->get('idCurso');
        $cursoxrango->save();
        return Redirect::to('cursoxrango');
    }
    public function show($id){
        
        $cursos=DB::table('curso')->get();
        $rangos=DB::table('rango')->get();
        return view("cursoxrango.show",["cursoxrango"=>cursoxrango::findOrFail($id),"cursos"=>$cursos,"rangos"=>$rangos]);
    }
    public function edit($id){
        
        $cursos=DB::table('curso')->get();
        $rangos=DB::table('rango')->get();
        return view("cursoxrango.edit",["cursoxrango"=>cursoxrango::findOrFail($id),"cursos"=>$cursos,"rangos"=>$rangos]);
    }
    public function update(CursoxrangoFormRequest $request,$id){
        $cursoxrango=Cursoxrango::findOrFail($id);
		
        $cursoxrango->idRango = $request->get('idRango');
        $cursoxrango->idCurso = $request->get('idCurso');
        $cursoxrango->update();
        return Redirect::to('cursoxrango');
    }
    public function destroy($id){
        $cursoxrango=Cursoxrango::findOrFail($id);
        $cursoxrango->delete();
        return Redirect::to('cursoxrango');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$cursoxrango=Cursoxrango::findOrFail($id);
		//cursoxrango->estado='Inactivo';
        //$cursoxrango->update();
        //return Redirect::to('cursoxrango');
    }
}
