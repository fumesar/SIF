<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Prestamo_equipo;
use App\Models\Equipo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente
use App\Http\Requests\Prestamo_equipoFormRequest;
use DB;
use Carbon\Carbon;

class Prestamo_equipoControlador extends Controller
{
    public function __construct(){
        
    }
    public function index(Request $request){
        $equipos=DB::table('equipo')->get();
        
        $hoy=Carbon::now();
        if ($request){
            $query=trim($request->get('searchText'));
            $prestamo_equipos=DB::table('prestamo_equipo')
            ->join('equipo','prestamo_equipo.idEquipo','=','equipo.idEquipo')
            ->select('prestamo_equipo.idPrestamoEquipo','prestamo_equipo.NroDocumento','prestamo_equipo.idEquipo','prestamo_equipo.Referencia','prestamo_equipo.FechaVencimiento','prestamo_equipo.Nota','equipo.NombreEquipo as NombreEquipo_equipo')
            ->paginate(10);
            return view('prestamo_equipo.index',["hoy"=>$hoy,"prestamo_equipos"=>$prestamo_equipos,"searchText"=>$query,"equipos"=>$equipos]);
        }
    }
    public function report(Request $request){
        if ($request){
            $prestamo_equipos=DB::table('prestamo_equipo')
            ->join('equipo','prestamo_equipo.idEquipo','=','equipo.idEquipo')
            ->select('prestamo_equipo.idPrestamoEquipo','prestamo_equipo.NroDocumento','prestamo_equipo.idEquipo','prestamo_equipo.Referencia','prestamo_equipo.FechaVencimiento','prestamo_equipo.Nota','equipo.NombreEquipo as NombreEquipo_equipo')
            ->paginate(1000);
            return view('prestamo_equipo.report',["prestamo_equipos"=>$prestamo_equipos]);
        }
    }
    public function create(){
        $hoy=Carbon::now();
        $equipos=DB::table('equipo')->get();
        return view("prestamo_equipo.create",["hoy"=>$hoy,"equipos"=>$equipos]);
    }
    public function store (Prestamo_equipoFormRequest $request){

        $idEquipo=$request->get('idEquipo');
        $equipo=Equipo::findOrFail($idEquipo);
        if($equipo->Cantidad<=0){
            return Redirect::to('prestamo_equipo')->with('error','No hay mas equipo para hacer prestamo');
        }
        try{
            DB::beginTransaction();
            $prestamo_equipo=new Prestamo_equipo;
            $prestamo_equipo->NroDocumento=$request->get('NroDocumento');
            $prestamo_equipo->idEquipo=$request->get('idEquipo');
            $prestamo_equipo->Referencia=$request->get('Referencia');
            $prestamo_equipo->FechaVencimiento=$request->get('FechaVencimiento');
            $prestamo_equipo->Nota='En Prestamo'; //$request->get('Nota');
            $prestamo_equipo->save();

            //actualiza cantidad
            $equipo->Cantidad--;
            $equipo->update();
            DB::commit();
            //toastr()->success(__('Grabación exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            //toastr()->error(__('La grabación NO ha sido exitosa'));
        }
        return Redirect::to('prestamo_equipo');
    }
    public function show($id){
        $equipos=DB::table('equipo')->get();
        return view("prestamo_equipo.show",["prestamo_equipo"=>prestamo_equipo::findOrFail($id),"equipos"=>$equipos]);
    }
    public function edit($id){
        $equipos=DB::table('equipo')->get();
        return view("prestamo_equipo.edit",["prestamo_equipo"=>prestamo_equipo::findOrFail($id),"equipos"=>$equipos]);
    }
    public function update(Prestamo_equipoFormRequest $request,$id){
        $idEquipo=$request->get('idEquipo');
        $equipo=Equipo::findOrFail($idEquipo);
      
        if($equipo->Cantidad<=0){
            return Redirect::to('prestamo_equipo')->with('error','No hay mas equipo para hacer prestamo');
        }
        try{
            DB::beginTransaction();
            $prestamo_equipo=Prestamo_equipo::findOrFail($id);
            $prestamo_equipo->NroDocumento = $request->get('NroDocumento');

            if($prestamo_equipo->idEquipo!=$request->get('idEquipo') and $prestamo_equipo->Nota=='En Prestamo'){
                
                $equipo=Equipo::findOrFail($prestamo_equipo->idEquipo);
                $equipo->Cantidad=$equipo->Cantidad+1;
                $equipo->update();

                $equipo=Equipo::findOrFail($request->get('idEquipo'));
                $equipo->Cantidad=$equipo->Cantidad-1;
                $equipo->update();
            }
            
            $prestamo_equipo->idEquipo = $request->get('idEquipo');
            $prestamo_equipo->Referencia = $request->get('Referencia');
            $prestamo_equipo->FechaVencimiento = $request->get('FechaVencimiento');
            //$prestamo_equipo->Nota = $request->get('Nota');
            $prestamo_equipo->update();
            DB::commit();
            //toastr()->success(__('Actualización exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            //toastr()->error(__('La actualización NO ha sido exitosa'));
        }  
        return Redirect::to('prestamo_equipo');
    }
    public function destroy($id){
        $prestamo_equipo=Prestamo_equipo::findOrFail($id);
        if($prestamo_equipo->Nota=='Devuelto'){ // devuelto
          Redirect::to('prestamo_equipo')->with('error','Solo se puede eliminar prestamos de equipos devueltos') ;
        }
        try{
            DB::beginTransaction();
            $prestamo_equipo=Prestamo_equipo::findOrFail($id);
            $prestamo_equipo->delete();
            DB::commit();
            //toastr()->success(__('Eliminación exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            //toastr()->error(__('La eliminacion NO ha sido exitosa'));
        }
        return Redirect::to('prestamo_equipo');
    }
    public function devolver($id){
        $prestamo_equipo=Prestamo_equipo::findOrFail($id);
        if($prestamo_equipo->Nota!=='En Prestamo'){ // devuelto
          Redirect::to('prestamo_equipo')->with('error','Solo se puede devolver si esta En Prestamo') ;
        }
        try{
            DB::beginTransaction();
            $prestamo_equipo=Prestamo_equipo::findOrFail($id);
            $prestamo_equipo->Nota='Devuelto';
            $prestamo_equipo->update();

            $equipo=Equipo::findOrFail($prestamo_equipo->idEquipo);
            $equipo->Cantidad=$equipo->Cantidad+1;
            $equipo->update();

            DB::commit();
            //toastr()->success(__('Eliminación exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            //toastr()->error(__('La eliminacion NO ha sido exitosa'));
        }
        return Redirect::to('prestamo_equipo');
    }
}
