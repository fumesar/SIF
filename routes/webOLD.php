<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('usuario','App\Http\Controllers\UsuarioController')->middleware('permission:users');
// Route::resource('marca','App\Http\Controllers\MarcaControlador')->middleware('permission:marcas_listar');
// Route::resource('modelo','App\Http\Controllers\ModeloControlador')->middleware('permission:modelos_listar');

// Sistema
Route::resource('anotacion','App\Http\Controllers\AnotacionControlador')->middleware('permission:anotacion');
Route::resource('antiguedad','App\Http\Controllers\AntiguedadControlador')->middleware('permission:antiguedad');
Route::resource('asignatura','App\Http\Controllers\AsignaturaControlador')->middleware('permission:asignatura');
Route::resource('asistencia','App\Http\Controllers\AsistenciaControlador')->middleware('permission:asistencia');
Route::resource('asistencia_servicio_social','App\Http\Controllers\Asistencia_servicio_socialControlador')->middleware('permission:asistencia_servicio_social');
Route::resource('brigada','App\Http\Controllers\BrigadaControlador')->middleware('permission:brigada');
Route::resource('calificacion','App\Http\Controllers\CalificacionControlador')->middleware('permission:calificacion');
Route::resource('cargo','App\Http\Controllers\CargoControlador')->middleware('permission:cargo');
Route::resource('colegio','App\Http\Controllers\ColegioControlador')->middleware('permission:colegio');
Route::resource('curso','App\Http\Controllers\CursoControlador')->middleware('permission:curso');
Route::resource('cursoxrango','App\Http\Controllers\CursoxrangoControlador')->middleware('permission:cargo');
Route::resource('curso_colegio','App\Http\Controllers\Curso_colegioControlador')->middleware('permission:cursoxrango');
Route::resource('departamento_nacimiento','App\Http\Controllers\Departamento_nacimientoControlador')->middleware('permission:departamento_nacimiento');
Route::resource('departamento_residencia','App\Http\Controllers\Departamento_residenciaControlador')->middleware('permission:departamento_residencia');
Route::resource('equipo','App\Http\Controllers\EquipoControlador')->middleware('permission:equipo');
Route::resource('estado','App\Http\Controllers\EstadoControlador')->middleware('permission:estado');
Route::resource('estado_asistencia','App\Http\Controllers\Estado_asistenciaControlador')->middleware('permission:estado_asistencia');
Route::resource('estado_equipo','App\Http\Controllers\Estado_equipoControlador')->middleware('permission:estado_equipo');
Route::resource('estado_jefatura','App\Http\Controllers\Estado_jefaturaControlador')->middleware('permission:estado_jefatura');
Route::resource('estado_matricula','App\Http\Controllers\Estado_matriculaControlador')->middleware('permission:estado_matricula');
Route::resource('falta','App\Http\Controllers\FaltaControlador')->middleware('permission:falta');
Route::resource('instructor','App\Http\Controllers\InstructorControlador')->middleware('permission:instructor');
Route::resource('instructoresxcurso','App\Http\Controllers\InstructoresxcursoControlador')->middleware('permission:instructoresxcurso');
Route::resource('jefatura','App\Http\Controllers\JefaturaControlador')->middleware('permission:jefatura');
    Route::get('jefatura_ascender/{id}','App\Http\Controllers\JefaturaControlador@ascender')->middleware('permission:jefatura');
    Route::patch('jefatura_updaterango/{id}','App\Http\Controllers\JefaturaControlador@updaterango')->name('jefatura.updaterango')->middleware('permission:jefatura');
Route::resource('jornada','App\Http\Controllers\JornadaControlador')->middleware('permission:jornada');
Route::resource('localidad','App\Http\Controllers\LocalidadControlador')->middleware('permission:localidad');
Route::resource('matricular','App\Http\Controllers\MatricularControlador')->middleware('permission:matricular');
Route::resource('nivel_academico','App\Http\Controllers\Nivel_academicoControlador')->middleware('permission:nivel_academico');
Route::resource('peloton','App\Http\Controllers\PelotonControlador')->middleware('permission:peloton');
Route::resource('prestamo_equipo','App\Http\Controllers\Prestamo_equipoControlador')->middleware('permission:prestamo_equipo');
Route::resource('profesion','App\Http\Controllers\ProfesionControlador')->middleware('permission:profesion');
Route::resource('proveedor','App\Http\Controllers\ProveedorControlador')->middleware('permission:proveedor');
Route::resource('puesto','App\Http\Controllers\PuestoControlador')->middleware('permission:puesto');
Route::resource('rango','App\Http\Controllers\RangoControlador')->middleware('permission:rango');
Route::resource('rh','App\Http\Controllers\RhControlador')->middleware('permission:rh');
Route::resource('seccional','App\Http\Controllers\SeccionalControlador')->middleware('permission:seccional');
Route::resource('semestre','App\Http\Controllers\SemestreControlador')->middleware('permission:semestre');
Route::resource('servicio_social','App\Http\Controllers\Servicio_socialControlador')->middleware('permission:servicio_social');
    Route::get('servicio_social','App\Http\Controllers\Servicio_socialControlador@index')->middleware('permission:servicio_social_index');
    Route::get('servicio_social/create','App\Http\Controllers\Servicio_socialControlador@create')->middleware('permission:servicio_social_create');
Route::resource('tablas','App\Http\Controllers\TablasControlador')->middleware('permission:tablas');
Route::resource('tercero','App\Http\Controllers\TerceroControlador')->middleware('permission:tercero');
Route::resource('tipo_anotacion','App\Http\Controllers\Tipo_anotacionControlador')->middleware('permission:tipo_anotacion');
Route::resource('tipo_documento','App\Http\Controllers\Tipo_documentoControlador')->middleware('permission:tipo_documento');
Route::resource('tipo_tercero','App\Http\Controllers\Tipo_terceroControlador')->middleware('permission:tipo_tercero');
Route::resource('users','App\Http\Controllers\UsersControlador')->middleware('permission:users');

//Reportes
Route::get('anotacion_report','App\Http\Controllers\AnotacionControlador@report')->middleware('permission:anotacion');
Route::get('antiguedad_report','App\Http\Controllers\AntiguedadControlador@report')->middleware('permission:antiguedad');
Route::get('asignatura_report','App\Http\Controllers\AsignaturaControlador@report')->middleware('permission:asignatura');
Route::get('asistencia_report','App\Http\Controllers\AsistenciaControlador@report')->middleware('permission:asistencia');
Route::get('asistencia_servicio_social_report','App\Http\Controllers\Asistencia_servicio_socialControlador@report')->middleware('permission:asistencia_servicio_social_report');
Route::get('brigada_report','App\Http\Controllers\BrigadaControlador@report')->middleware('permission:brigada');
Route::get('calificacion_report','App\Http\Controllers\CalificacionControlador@report')->middleware('permission:calificacion');
Route::get('calificacion_create','App\Http\Controllers\CalificacionControlador@create')->middleware('permission:calificacion');

Route::get('cargo_report','App\Http\Controllers\CargoControlador@report')->middleware('permission:cargo');
Route::get('colegio_report','App\Http\Controllers\ColegioControlador@report')->middleware('permission:colegio');
Route::get('curso_report','App\Http\Controllers\CursoControlador@report')->middleware('permission:curso');
Route::get('cursoxrango_report','App\Http\Controllers\CursoxrangoControlador@report')->middleware('permission:cursoxrango');
Route::get('curso_colegio_report','App\Http\Controllers\Curso_colegioControlador@report')->middleware('permission:curso_colegio');
Route::get('departamento_nacimiento_report','App\Http\Controllers\Departamento_nacimientoControlador@report')->middleware('permission:departamento_nacimiento');
Route::get('departamento_residencia_report','App\Http\Controllers\Departamento_residenciaControlador@report')->middleware('permission:departamento_residencia');
Route::get('equipo_report','App\Http\Controllers\EquipoControlador@report')->middleware('permission:equipo');
Route::get('estado_report','App\Http\Controllers\EstadoControlador@report')->middleware('permission:estado');
Route::get('estado_asistencia_report','App\Http\Controllers\Estado_asistenciaControlador@report')->middleware('permission:estado_asistencia');
Route::get('estado_equipo_report','App\Http\Controllers\Estado_equipoControlador@report')->middleware('permission:estado_equipo');
Route::get('estado_jefatura_report','App\Http\Controllers\Estado_jefaturaControlador@report')->middleware('permission:estado_jefatur');
Route::get('estado_matricula_report','App\Http\Controllers\Estado_matriculaControlador@report')->middleware('permission:estado_matricula');
Route::get('falta_report','App\Http\Controllers\FaltaControlador@report')->middleware('permission:falta');
Route::get('instructor_report','App\Http\Controllers\InstructorControlador@report')->middleware('permission:instructor');
Route::get('instructoresxcurso_report','App\Http\Controllers\InstructoresxcursoControlador@report')->middleware('permission:instructoresxcurso');
Route::get('jefatura_report','App\Http\Controllers\JefaturaControlador@report')->middleware('permission:jefatura_report');
Route::get('jornada_report','App\Http\Controllers\JornadaControlador@report')->middleware('permission:jornada');
Route::get('localidad_report','App\Http\Controllers\LocalidadControlador@report')->middleware('permission:localidad');
Route::get('matricular_report','App\Http\Controllers\MatricularControlador@report')->middleware('permission:matricular');
Route::get('nivel_academico_report','App\Http\Controllers\Nivel_academicoControlador@report')->middleware('permission:nivel_academico');
Route::get('peloton_report','App\Http\Controllers\PelotonControlador@report')->middleware('permission:peloton');
Route::get('prestamo_equipo_report','App\Http\Controllers\Prestamo_equipoControlador@report')->middleware('permission:prestamo_equipo');
Route::get('profesion_report','App\Http\Controllers\ProfesionControlador@report')->middleware('permission:profesion');
Route::get('proveedor_report','App\Http\Controllers\ProveedorControlador@report')->middleware('permission:proveedor');
Route::get('puesto_report','App\Http\Controllers\PuestoControlador@report')->middleware('permission:puesto');
Route::get('rango_report','App\Http\Controllers\RangoControlador@report')->middleware('permission:rango');
Route::get('rh_report','App\Http\Controllers\RhControlador@report')->middleware('permission:rh');
Route::get('seccional_report','App\Http\Controllers\SeccionalControlador@report')->middleware('permission:seccional');
Route::get('semestre_report','App\Http\Controllers\SemestreControlador@report')->middleware('permission:semestre');
Route::get('servicio_social_report','App\Http\Controllers\Servicio_socialControlador@report')->middleware('permission:servicio_social');
Route::get('servicio_social_certificado','App\Http\Controllers\Servicio_socialControlador@indexCertificados')->middleware('permission:servicio_social');
Route::get('servicio_social_certificado/{id}','App\Http\Controllers\Servicio_socialControlador@certificado')->middleware('permission:servicio_social');
Route::get('tablas_report','App\Http\Controllers\TablasControlador@report')->middleware('permission:tablas');
Route::get('tercero_report','App\Http\Controllers\TerceroControlador@report')->middleware('permission:tercero');
Route::get('tipo_anotacion_report','App\Http\Controllers\Tipo_anotacionControlador@report')->middleware('permission:tipo_anotacion');
Route::get('tipo_documento_report','App\Http\Controllers\Tipo_documentoControlador@report')->middleware('permission:tipo_documento');
Route::get('tipo_tercero_report','App\Http\Controllers\Tipo_terceroControlador@report')->middleware('permission:tipo_tercero');
Route::get('users_report','App\Http\Controllers\UsersControlador@report')->middleware('permission:users');


Route::post('prestamo_equipo_devolver/{idPrestamoEquipo}','App\Http\Controllers\Prestamo_equipoControlador@devolver')->middleware('permission:prestamo_equipo');
Route::get('/getJefatura/{id}','App\Http\Controllers\JefaturaControlador@getJefatura')->middleware('permission:jefatura');
    
Route::get('storage-link',function(){
    Artisan::call('storage:link');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
