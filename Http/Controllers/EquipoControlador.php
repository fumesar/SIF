<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Equipo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente
use App\Http\Requests\EquipoFormRequest;
use DB;
use Carbon\Carbon;

class EquipoControlador extends Controller
{
    public function __construct(){
        
    }
    public function index(Request $request){
        $estado_equipos=DB::table('estado_equipo')->get();
        
        
        if ($request){
            $query=trim($request->get('searchText'));
            $equipos=DB::table('equipo')
            ->paginate(10);
            return view('equipo.index',["equipos"=>$equipos,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $equipos=DB::table('equipo')
            ->paginate(1000);
            return view('equipo.report',["equipos"=>$equipos]);
        }
    }
    public function create(){
        $estado_equipos=DB::table('estado_equipo')->get();
        return view("equipo.create");
    }
    public function store (EquipoFormRequest $request){
        try{
            $equipo=new Equipo;
            
            $equipo->NombreEquipo=$request->get('NombreEquipo');
            $equipo->Referencia=$request->get('Referencia');
            $equipo->Cantidad=$request->get('Cantidad');
            $equipo->NroEstante=$request->get('NroEstante');
            
            $equipo->save();
            
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            //toastr()->error(__('La grabación NO ha sido exitosa'));
        }
        return Redirect::to('equipo');
    }
    public function show($id){
        $estado_equipos=DB::table('estado_equipo')->get();
        return view("equipo.show",["equipo"=>equipo::findOrFail($id)]);
    }
    public function edit($id){
        $estado_equipos=DB::table('estado_equipo')->get();
        return view("equipo.edit",["equipo"=>equipo::findOrFail($id)]);
    }
    public function update(EquipoFormRequest $request,$id){
        try{
            $equipo=Equipo::findOrFail($id);
    		
            $equipo->NombreEquipo = $request->get('NombreEquipo');
            $equipo->Referencia = $request->get('Referencia');
            $equipo->Cantidad=$request->get('Cantidad');
            $equipo->NroEstante = $request->get('NroEstante');
          
            $equipo->update();
            
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La actualización NO ha sido exitosa'));
        }  
        return Redirect::to('equipo');
    }
    public function destroy($id){
        try{
            DB::beginTransaction();
            $equipo=Equipo::findOrFail($id);
            $equipo->delete();
            DB::commit();
            
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            
        }
        return Redirect::to('equipo');
    }
}
