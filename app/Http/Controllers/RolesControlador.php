<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Role;
use App\Models\Role_has_permission;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RolesFormRequest;
use DB;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente
use Illuminate\Support\Facades\Storage; // es necesario si hay campo con imagenes: foto, imagen, logos etc

class RolesControlador extends Controller
{
    public function __construct(){
        //|autenticar| 
    }
    public function index(Request $request){
        // $permisos = db::table('permissions')->distinct('tabla')
        //     ->select('tabla',DB::raw('0 as listar'),DB::raw('0 as crear'),DB::raw('0 as editar'),DB::raw('0 as ver'), DB::raw('0 as eliminar'))
        //     ->get();
        //dd($permisos);
        $roles_has_permissions=db::table('role_has_permissions')
            ->join('roles','roles.id','=','role_has_permissions.role_id')
            ->join('permissions','permissions.id','=','role_has_permissions.permission_id')
            ->select('permission_id','permissions.name as permission_name','role_id','roles.name as rol_name')
            ->get();
        if ($request){
            $searchText=trim($request->get('searchText'));
            $roles=Role::paginate(10);
            //dd($roles_has_permissions);
            $roles2 = collect();
            foreach($roles as $rol){
                // parche
                $permisos2 = db::table('permissions')->distinct('tabla')
                        ->select('tabla',DB::raw('0 as listar'),DB::raw('0 as crear'),DB::raw('0 as editar'),DB::raw('0 as ver'), DB::raw('0 as eliminar'), DB::raw('0 as reportar'))
                        ->get();
                // if($rol->id==2)
                //     dd($permisos,$permisos2);
                foreach($roles_has_permissions as $rol_has_permission){
                    if($rol_has_permission->role_id == $rol->id){
                        foreach($permisos2 as $permiso2){
                            if(Str::contains($rol_has_permission->permission_name, 'list') and substr($rol_has_permission->permission_name,5,100)==$permiso2->tabla)
                                $permiso2->listar=1;
                            if(Str::contains($rol_has_permission->permission_name, 'create') and substr($rol_has_permission->permission_name,7,100)==$permiso2->tabla)
                                $permiso2->crear=1;
                            if(Str::contains($rol_has_permission->permission_name, 'edit') and substr($rol_has_permission->permission_name,5,100)== $permiso2->tabla)
                                $permiso2->editar=1;
                            if(Str::contains($rol_has_permission->permission_name, 'show') and substr($rol_has_permission->permission_name,5,100)== $permiso2->tabla)
                                $permiso2->ver=1;
                            if(Str::contains($rol_has_permission->permission_name, 'delete') and substr($rol_has_permission->permission_name,7,100)== $permiso2->tabla)
                                $permiso2->eliminar=1;
                            if(Str::contains($rol_has_permission->permission_name, 'report') and substr($rol_has_permission->permission_name,7,100)== $permiso2->tabla)
                                $permiso2->reportar=1;
                        }
                    }
                }
                //$rol->permisos = collect(['id' => $rol->id,'name' => $rol->name,'permisos' => $permisos2])->toJson();
                // if($rol->id==4)
                //     dd($permisos2->toJson());
                $rol->permisos = $permisos2->toJson();
            }
            //dd($roles);
            foreach($roles as $rol){
                $data = collect(['id' => $rol->id,'name' => $rol->name,'permisos' => json_decode($rol->permisos)]);
                $roles2->push($data);
            }
            //dd($roles2);
            return view('roles.index',compact('roles','roles2','searchText','roles_has_permissions'));
        }
    }
    public function report(Request $request){
        if ($request){
            $roles=Role::paginate(1000);
            return view('roles.report',compact('roles'));
        }
    }
    public function create(){
        
        return view('roles.create',compact());
    }
    public function store (RolesFormRequest $request){
        try{
            $role=new Role;
            $role->name=$request->get('name');
            $role->guard_name=$request->get('guard_name');
            $role->save();
            toastr()->success(__('Grabación exitosa...'));
        }catch(\Exception $e){
            //DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La grabación NO ha sido exitosa'));
        }
        return Redirect::to('roles');
    }
    public function show($id){
        $role=Role::findOrFail($id);
        return view('roles.show',compact('role',));
    }
    public function edit($id){
        $role=Role::findOrFail($id);
        return view('roles.edit',compact('role',));
    }
    public function update(RolesFormRequest $request,$id){

        $listar=$request->get('listar');
        $crear =$request->get('crear');
        $editar =$request->get('editar');
        $ver =$request->get('ver');
        $eliminar =$request->get('eliminar');
        $reportar =$request->get('reportar');

        $listar = isset($listar) ? $listar : [];
        $crear = isset($crear) ? $crear : [];
        $editar = isset($editar) ? $editar : [];
        $ver = isset($ver) ? $ver : [];
        $eliminar = isset($eliminar) ? $eliminar : [];
        $reportar = isset($reportar) ? $reportar : [];
        //dd($listar,$crear, $editar, $ver, $eliminar);
        //try{
            $role=Role::findOrFail($id);
    		$role->name = $request->get('name');
            $role->guard_name = $request->get('guard_name');
            $role->update();
            // Borrar las que no existen
            $rol_has_permissions = Role_has_permission::
                    join('permissions','permissions.id','=','role_has_permissions.permission_id')
                ->select('permission_id','permissions.name as permission_name','role_id')
                ->where('role_id',$id)
                ->whereNotIn('permissions.name',$listar)
                ->whereNotIn('permissions.name',$crear)
                ->whereNotIn('permissions.name',$editar)
                ->whereNotIn('permissions.name',$ver)
                ->whereNotIn('permissions.name',$eliminar)
                ->whereNotIn('permissions.name',$reportar)
                ->where('permissions.name','<>','emitir certificados')
                ->delete();
            //dd($rol_has_permissions);

            //dd($listar,$crear,$editar,$ver,$eliminar);
            // Agregar los nuevos permisos para listar
            foreach($listar as $key => $lista){
                $permission_id = DB::table('permissions')->where('name',$lista)->value('id');
                Role_has_permission::firstOrCreate([
                    'permission_id' => $permission_id,
                    'role_id' => $id,
                ]);
            }
            // Agregar los nuevos permisos para crear
            foreach($crear as $key => $crea){
                $permission_id = DB::table('permissions')->where('name',$crea)->value('id');
                Role_has_permission::firstOrCreate([
                    'permission_id' => $permission_id,
                    'role_id' => $id,
                ]);
            }
            // Agregar los nuevos permisos para editar
            foreach($editar as $key => $edita){
                $permission_id = DB::table('permissions')->where('name',$edita)->value('id');
                Role_has_permission::firstOrCreate([
                    'permission_id' => $permission_id,
                    'role_id' => $id,
                ]);
            }
            // Agregar los nuevos permisos para ver
            foreach($ver as $key => $ve){
                $permission_id = DB::table('permissions')->where('name',$ve)->value('id');
                Role_has_permission::firstOrCreate([
                    'permission_id' => $permission_id,
                    'role_id' => $id,
                ]);
            }
            // Agregar los nuevos permisos para eliminar
            foreach($eliminar as $key => $elimina){
                $permission_id = DB::table('permissions')->where('name',$elimina)->value('id');
                Role_has_permission::firstOrCreate([
                    'permission_id' => $permission_id,
                    'role_id' => $id,
                ]);
            }
            // Agregar los nuevos permisos para reportar
            foreach($reportar as $key => $reporta){
                $permission_id = DB::table('permissions')->where('name',$reporta)->value('id');
                Role_has_permission::firstOrCreate([
                    'permission_id' => $permission_id,
                    'role_id' => $id,
                ]);
            }
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
            toastr()->success(__('Actualización exitosa...'));
        // }catch(\Exception $e){
        //     //DB::rollback(); // en caso de error anulo transaccion
        //     toastr()->error(__('La actualización NO ha sido exitosa'));
        // }  
        return Redirect::to('roles');
    }
    public function destroy($id){
        try{
            //DB::beginTransaction();
            $role=Role::findOrFail($id);
            $role->delete();
            //DB::commit();
            toastr()->success(__('Eliminación exitosa...'));
        }catch(\Exception $e){
            //DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La eliminacion NO ha sido exitosa'));
        }
        return Redirect::to('roles');
    }
}
