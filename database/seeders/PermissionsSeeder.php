<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $data = $this->data();
        // Creación de Permisos
        foreach ($data as $value) {
            Permission::create([
                'name' => $value['name'],
                'tabla' => $value['tabla'],
            ]);
        }

        // Creación de roles
        // $admin = Role::create(['name' => 'Admin']); 
        // $servicio = Role::create(['name' => 'Servicio']); 
        // $cliente = Role::create(['name' => 'Cliente']); 

        // Asignamos roles a los usuarios
    //     $user = User::find(1);
    //     $user->assignRole('Admin');
    }

    public function data()
    {
        $data = [];
        // list of model permission
        $model = ['brigada','cargo','colegio','curso_colegio','departamento_nacimiento','departamento_residencia','equipo','estado','estado_asistencia','estado_equipo','estado_jefatura','estado_matricula','falta','jornada','localidad','nivel_academico','peloton','permissions','profesion','puesto','rango','rh','roles','seccional','semestre','tablas','tipo_anotacion','tipo_documento','tipo_tercero','instructor','model_has_permissions','model_has_roles','prestamo_equipo','antiguedad','asistencia_servicio_social','curso','cursoxrango','instructoresxcurso','proveedor','role_has_permissions','tiempo_rango','anotacion','asignatura','matricular','asistencia','calificacion','tercero','servicio_social','jefatura',];
        foreach ($model as $value) {
            foreach ($this->crudActions($value) as $action) {
                $data[] = [
                    'name' => $action,
                    'tabla' => $value,
                ];
            }
        }
        // Permisos de ver dashboard
        // $data[]=['dashboard admin'],
        // $data[]=['dashboard servicio'],
        // $data[]=['dashboard cliente'],

        return $data;
    }

    public function crudActions($name)
    {
        $actions = [];
        // list of permission actions
        $crud = ['list','create', 'show', 'edit', 'delete','report'];

        foreach ($crud as $value) {
            $actions[] = $value.' '.$name;
        }

        return $actions;
    }
}
