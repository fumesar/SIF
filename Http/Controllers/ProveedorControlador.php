<?php

//namespace FUMESAR\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use FUMESAR\Http\Requests;
use App\Http\Requests;

//use FUMESAR\Proveedor;
use App\Models\Proveedor;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente

//use FUMESAR\Http\Requests\ProveedorFormRequest;
use App\Http\Requests\ProveedorFormRequest;

use DB;

class ProveedorControlador extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $proveedors=DB::table('proveedor')
            ->join('departamento_residencia','proveedor.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
            ->join('tipo_documento','proveedor.idTipoDocumento','=','tipo_documento.idTipoDocumento')
            ->select('proveedor.idProveedor','proveedor.NumeroDocumento','proveedor.Nombres','proveedor.Apellidos','proveedor.Direccion','proveedor.CiudadResidencia','proveedor.Telefono','proveedor.Celular','proveedor.PersonaContacto','proveedor.PaginaWeb','proveedor.Correo','departamento_residencia.DepartamentoResidencia as departamento_residencia','tipo_documento.TipoDocumento as tipo_documento')->paginate(10);
            return view('proveedor.index',["proveedors"=>$proveedors,"searchText"=>$query]);
        }
    }
    public function report(Request $request){
        if ($request){
            $proveedors=DB::table('proveedor')
            ->join('departamento_residencia','proveedor.idDepartamentoResidencia','=','departamento_residencia.idDepartamentoResidencia')
            ->join('tipo_documento','proveedor.idTipoDocumento','=','tipo_documento.idTipoDocumento')
            ->select('proveedor.idProveedor','proveedor.NumeroDocumento','proveedor.Nombres','proveedor.Apellidos','proveedor.Direccion','proveedor.CiudadResidencia','proveedor.Telefono','proveedor.Celular','proveedor.PersonaContacto','proveedor.PaginaWeb','proveedor.Correo','departamento_residencia.DepartamentoResidencia as departamento_residencia','tipo_documento.TipoDocumento as tipo_documento')->paginate(1000);
            return view('proveedor.report',["proveedors"=>$proveedors]);
        }
    }
    public function create(){
		
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        return view("proveedor.create",["departamento_residencias"=>$departamento_residencias,"tipo_documentos"=>$tipo_documentos]);
    }
    public function store (ProveedorFormRequest $request){
        $proveedor=new Proveedor;
        
        $proveedor->idTipoDocumento=$request->get('idTipoDocumento');
        $proveedor->NumeroDocumento=$request->get('NumeroDocumento');
        $proveedor->Nombres=$request->get('Nombres');
        $proveedor->Apellidos=$request->get('Apellidos');
        $proveedor->Direccion=$request->get('Direccion');
        $proveedor->idDepartamentoResidencia=$request->get('idDepartamentoResidencia');
        $proveedor->CiudadResidencia=$request->get('CiudadResidencia');
        $proveedor->Telefono=$request->get('Telefono');
        $proveedor->Celular=$request->get('Celular');
        $proveedor->PersonaContacto=$request->get('PersonaContacto');
        $proveedor->PaginaWeb=$request->get('PaginaWeb');
        $proveedor->Correo=$request->get('Correo');
        $proveedor->save();
        return Redirect::to('proveedor');
    }
    public function show($id){
        
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        return view("proveedor.show",["proveedor"=>proveedor::findOrFail($id),"departamento_residencias"=>$departamento_residencias,"tipo_documentos"=>$tipo_documentos]);
    }
    public function edit($id){
        
        $departamento_residencias=DB::table('departamento_residencia')->get();
        $tipo_documentos=DB::table('tipo_documento')->get();
        return view("proveedor.edit",["proveedor"=>proveedor::findOrFail($id),"departamento_residencias"=>$departamento_residencias,"tipo_documentos"=>$tipo_documentos]);
    }
    public function update(ProveedorFormRequest $request,$id){
        $proveedor=Proveedor::findOrFail($id);
		
        $proveedor->idTipoDocumento = $request->get('idTipoDocumento');
        $proveedor->NumeroDocumento = $request->get('NumeroDocumento');
        $proveedor->Nombres = $request->get('Nombres');
        $proveedor->Apellidos = $request->get('Apellidos');
        $proveedor->Direccion = $request->get('Direccion');
        $proveedor->idDepartamentoResidencia = $request->get('idDepartamentoResidencia');
        $proveedor->CiudadResidencia = $request->get('CiudadResidencia');
        $proveedor->Telefono = $request->get('Telefono');
        $proveedor->Celular = $request->get('Celular');
        $proveedor->PersonaContacto = $request->get('PersonaContacto');
        $proveedor->PaginaWeb = $request->get('PaginaWeb');
        $proveedor->Correo = $request->get('Correo');
        $proveedor->update();
        return Redirect::to('proveedor');
    }
    public function destroy($id){
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->delete();
        return Redirect::to('proveedor');
    }
	// Solo aplicaría a algunas tablas
	public function inactivar($id)
    {
        //$proveedor=Proveedor::findOrFail($id);
		//proveedor->estado='Inactivo';
        //$proveedor->update();
        //return Redirect::to('proveedor');
    }
}
