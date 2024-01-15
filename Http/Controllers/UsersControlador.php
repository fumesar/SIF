<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Users;
use App\Models\Users;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\UsersFormRequest;
use App\Http\Requests\UsersFormRequest;

use DB;

class UsersControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $userss=DB::table('users')
            ->paginate(10);
            return view('users.index',["userss"=>$userss,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $userss=DB::table('users')
            ->paginate(1000);
            return view('users.report',["userss"=>$userss]);
        }
    }
    public function create(){
		
        return view("users.create",[]);
    }
    public function store (UsersFormRequest $request){
        $users=new Users;
        
        $users->name=$request->get('name');
        $users->email=$request->get('email');
        $users->password=$request->get('password');
        $users->remember_token=$request->get('remember_token');
        $users->created_at=$request->get('created_at');
        $users->updated_at=$request->get('updated_at');
        $users->save();
        return Redirect::to('users');
    }
    public function show($id){
        
        return view("users.show",["users"=>users::findOrFail($id),]);
    }
    public function edit($id){
        
        return view("users.edit",["users"=>users::findOrFail($id),]);
    }
    public function update(UsersFormRequest $request,$id){
        $users=Users::findOrFail($id);
		
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = $request->get('password');
        $users->remember_token = $request->get('remember_token');
        $users->created_at = $request->get('created_at');
        $users->updated_at = $request->get('updated_at');
        $users->update();
        return Redirect::to('users');
    }
    public function destroy($id){
        $users=Users::findOrFail($id);
        $users->delete();
        return Redirect::to('users');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$users=Users::findOrFail($id);
		//users->estado='Inactivo';
        //$users->update();
        //return Redirect::to('users');
    }
}
