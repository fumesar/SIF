<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(Request $request){
		if($request){
			$query=trim($request->get('searchText'));
			$usuarios=DB::table('users')
                ->leftJoin('colegio','colegio.idColegio','=','users.idColegio')
                ->leftJoin('model_has_roles','model_id','=','users.id')
                ->leftJoin('roles','roles.id','=','model_has_roles.role_id')
                ->where('users.name','LIKE','%'.$query.'%')
                ->select('users.*','colegio.colegio','roles.id as rol_id','roles.name as rol_name')
			->orderBy('id','desc')
			->paginate(7);
            //dd($usuarios);
			return view('usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
		}

    }

    public function create(){
        $colegios=DB::table('colegio')->get();
        $roles=DB::table('roles')->get();
    	return view("usuario.create",compact('colegios','roles'));
    }

    public function store(UsuarioFormRequest $request){
        $rol=DB::table('roles')->where('id',$request->get('idrol'))->value('name');
    	$usuario=new User;
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
        $usuario->idColegio=$request->get('idColegio');
        $usuario->assignRole($rol);
    	$usuario->save();
    	return Redirect::to('usuario');
    }

    public function edit($id){
        $colegios=DB::table('colegio')->get();
        $usuario=User::
            leftJoin('model_has_roles','model_id','=','users.id')
            ->leftJoin('roles','roles.id','=','model_has_roles.role_id')
            ->where('users.id',$id)
            ->select('users.*','roles.id as rol_id','roles.name as rol_name')
            ->first();
        $roles=DB::table('roles')->get();
        //dd($usuario);
    	return view("usuario.edit",compact('usuario','colegios','roles'));

    }

    public function update(UsuarioFormRequest $request,$id){
    	$usuario=User::findOrFail($id);
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
        $usuario->idColegio=$request->get('idColegio');
    	$usuario->update();
    	return Redirect::to('usuario');
    }

    public function destroy($id){
    	$usuario =DB::table('users')->where('id','=',$id)->delete();
    	return Redirect::to('usuario');
    }
}
