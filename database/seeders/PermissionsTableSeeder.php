<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Lista de permisos
		$permission = Permission::create(['name' => 'anotacion']);
		$permission = Permission::create(['name' => 'antiguedad']);
		$permission = Permission::create(['name' => 'asignatura']);
		$permission = Permission::create(['name' => 'asistencia']);
		$permission = Permission::create(['name' => 'asistencia_servicio_social']);
		$permission = Permission::create(['name' => 'asistencia_servicio_social_report']);
		$permission = Permission::create(['name' => 'brigada']);
		$permission = Permission::create(['name' => 'calificacion']);
		$permission = Permission::create(['name' => 'cargo']);
		$permission = Permission::create(['name' => 'colegio']);
		$permission = Permission::create(['name' => 'curso']);
		$permission = Permission::create(['name' => 'cursoxrango']);
		$permission = Permission::create(['name' => 'curso_colegio']);
		$permission = Permission::create(['name' => 'departamento_nacimiento']);
		$permission = Permission::create(['name' => 'departamento_residencia']);
		$permission = Permission::create(['name' => 'equipo']);
		$permission = Permission::create(['name' => 'estado']);
		$permission = Permission::create(['name' => 'estado_asistencia']);
		$permission = Permission::create(['name' => 'estado_equipo']);
		$permission = Permission::create(['name' => 'estado_jefatura']);
		$permission = Permission::create(['name' => 'estado_matricula']);
		$permission = Permission::create(['name' => 'falta']);
		$permission = Permission::create(['name' => 'instructor']);
		$permission = Permission::create(['name' => 'instructoresxcurso']);
		$permission = Permission::create(['name' => 'jefatura']);
		$permission = Permission::create(['name' => 'jefatura_report']);
		$permission = Permission::create(['name' => 'jornada']);
		$permission = Permission::create(['name' => 'localidad']);
		$permission = Permission::create(['name' => 'matricular']);
		$permission = Permission::create(['name' => 'nivel_academico']);
		$permission = Permission::create(['name' => 'peloton']);
		$permission = Permission::create(['name' => 'prestamo_equipo']);
		$permission = Permission::create(['name' => 'profesion']);
		$permission = Permission::create(['name' => 'proveedor']);
		$permission = Permission::create(['name' => 'puesto']);
		$permission = Permission::create(['name' => 'rango']);
		$permission = Permission::create(['name' => 'rh']);
		$permission = Permission::create(['name' => 'roles']);
		$permission = Permission::create(['name' => 'seccional']);
		$permission = Permission::create(['name' => 'semestre']);
		$permission = Permission::create(['name' => 'servicio_social']);
		$permission = Permission::create(['name' => 'servicio_social_index']);
		$permission = Permission::create(['name' => 'servicio_social_create']);
		$permission = Permission::create(['name' => 'tablas']);
		$permission = Permission::create(['name' => 'tercero']);
		$permission = Permission::create(['name' => 'tipo_anotacion']);
		$permission = Permission::create(['name' => 'tipo_documento']);
		$permission = Permission::create(['name' => 'tipo_tercero']);
		$permission = Permission::create(['name' => 'users']);

		// Lista de roles
		$Administrador = Role::create(['name' => 'Administrador']);
		$UsuarioColegio = Role::create(['name' => 'Colegios']);
		$UsuarioComandante = Role::create(['name' => 'Comandantes']);

		// // Se asigna los permisos al rol
		// $Administrador->givePermissionTo([
		// 	'usuarios_listar',
		// 	'usuarios_crear',
		// 	'usuarios_editar',
		// 	'usuarios_actualizar',
		// 	'usuarios_eliminar',
		// 	'usuarios_eliminar',
		// 	'marcas_listar',
		// 	'modelos_listar',
		// ]);

		$UsuarioColegio->givePermissionTo([
			'servicio_social',
		]);
		$UsuarioComandante->givePermissionTo([
			'asistencia_servicio_social_report','jefatura_report','servicio_social_index','servicio_social_create',
		]);
		// Asignamos roles a los usuarios
		$user = User::find(1);
		$user->assignRole('Administrador');
    }
}
