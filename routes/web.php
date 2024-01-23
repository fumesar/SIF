<?php

use App\Http\Controllers\JefaturaControlador;
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

Route::resource('usuario','App\Http\Controllers\UsuarioController')->middleware('permission:list usuarios');
// Route::resource('marca','App\Http\Controllers\MarcaControlador')->middleware('permission:marcas_listar');
// Route::resource('modelo','App\Http\Controllers\ModeloControlador')->middleware('permission:modelos_listar');

// Sistema
Route::resource('anotacion','App\Http\Controllers\AnotacionControlador')->middleware('permission:list anotacion');
Route::resource('antiguedad','App\Http\Controllers\AntiguedadControlador')->middleware('permission:list antiguedad');
Route::resource('asignatura','App\Http\Controllers\AsignaturaControlador')->middleware('permission:list asignatura');
Route::resource('asistencia','App\Http\Controllers\AsistenciaControlador')->middleware('permission:list asistencia');
Route::resource('asistencia_servicio_social','App\Http\Controllers\Asistencia_servicio_socialControlador')->middleware('permission:list asistencia_servicio_social');
Route::resource('brigada','App\Http\Controllers\BrigadaControlador')->middleware('permission:list brigada');
Route::resource('calificacion','App\Http\Controllers\CalificacionControlador')->middleware('permission:list calificacion');
Route::resource('cargo','App\Http\Controllers\CargoControlador')->middleware('permission:list cargo');
Route::resource('colegio','App\Http\Controllers\ColegioControlador')->middleware('permission:list colegio');
Route::resource('curso','App\Http\Controllers\CursoControlador')->middleware('permission:list curso');
Route::resource('cursoxrango','App\Http\Controllers\CursoxrangoControlador')->middleware('permission:list cargo');
Route::resource('curso_colegio','App\Http\Controllers\Curso_colegioControlador')->middleware('permission:list cursoxrango');
Route::resource('departamento_nacimiento','App\Http\Controllers\Departamento_nacimientoControlador')->middleware('permission:list departamento_nacimiento');
Route::resource('departamento_residencia','App\Http\Controllers\Departamento_residenciaControlador')->middleware('permission:list departamento_residencia');
Route::resource('equipo','App\Http\Controllers\EquipoControlador')->middleware('permission:list equipo');
Route::resource('estado','App\Http\Controllers\EstadoControlador')->middleware('permission:list estado');
Route::resource('estado_asistencia','App\Http\Controllers\Estado_asistenciaControlador')->middleware('permission:list estado_asistencia');
Route::resource('estado_equipo','App\Http\Controllers\Estado_equipoControlador')->middleware('permission:list estado_equipo');
Route::resource('estado_jefatura','App\Http\Controllers\Estado_jefaturaControlador')->middleware('permission:list estado_jefatura');
Route::resource('estado_matricula','App\Http\Controllers\Estado_matriculaControlador')->middleware('permission:list estado_matricula');
Route::resource('falta','App\Http\Controllers\FaltaControlador')->middleware('permission:list falta');
Route::resource('instructor','App\Http\Controllers\InstructorControlador')->middleware('permission:list instructor');
Route::resource('instructoresxcurso','App\Http\Controllers\InstructoresxcursoControlador')->middleware('permission:list instructoresxcurso');
Route::resource('jefatura','App\Http\Controllers\JefaturaControlador')->middleware('permission:list jefatura');
Route::get('jefatura_ascender/{id}','App\Http\Controllers\JefaturaControlador@ascender')->middleware('permission:edit jefatura');
Route::patch('jefatura_updaterango/{id}','App\Http\Controllers\JefaturaControlador@updaterango')->name('jefatura.updaterango')->middleware('permission:edit jefatura');
Route::get('jefatura.brigadas/{id}',[JefaturaControlador::class,'brigadas'])->name('jefatura.brigadas');
   

Route::resource('jornada','App\Http\Controllers\JornadaControlador')->middleware('permission:list jornada');
Route::resource('localidad','App\Http\Controllers\LocalidadControlador')->middleware('permission:list localidad');
Route::resource('matricular','App\Http\Controllers\MatricularControlador')->middleware('permission:list matricular');
Route::resource('nivel_academico','App\Http\Controllers\Nivel_academicoControlador')->middleware('permission:list nivel_academico');
Route::resource('peloton','App\Http\Controllers\PelotonControlador')->middleware('permission:list peloton');
Route::resource('prestamo_equipo','App\Http\Controllers\Prestamo_equipoControlador')->middleware('permission:list prestamo_equipo');
Route::resource('profesion','App\Http\Controllers\ProfesionControlador')->middleware('permission:list profesion');
Route::resource('proveedor','App\Http\Controllers\ProveedorControlador')->middleware('permission:list proveedor');
Route::resource('puesto','App\Http\Controllers\PuestoControlador')->middleware('permission:list puesto');
Route::resource('rango','App\Http\Controllers\RangoControlador')->middleware('permission:list rango');
Route::resource('rh','App\Http\Controllers\RhControlador')->middleware('permission:list rh');
Route::resource('seccional','App\Http\Controllers\SeccionalControlador')->middleware('permission:list seccional');
Route::resource('semestre','App\Http\Controllers\SemestreControlador')->middleware('permission:list semestre');
Route::resource('servicio_social','App\Http\Controllers\Servicio_socialControlador')->middleware('permission:list servicio_social');
    //Route::get('servicio_social','App\Http\Controllers\Servicio_socialControlador@index')->middleware('permission:list servicio_social');
    //Route::get('servicio_social/create','App\Http\Controllers\Servicio_socialControlador@create')->middleware('permission:create servicio_social');
Route::resource('tablas','App\Http\Controllers\TablasControlador')->middleware('permission:list tablas');
Route::resource('tercero','App\Http\Controllers\TerceroControlador')->middleware('permission:list tercero');
Route::resource('tipo_anotacion','App\Http\Controllers\Tipo_anotacionControlador')->middleware('permission:list tipo_anotacion');
Route::resource('tipo_documento','App\Http\Controllers\Tipo_documentoControlador')->middleware('permission:list tipo_documento');
Route::resource('tipo_tercero','App\Http\Controllers\Tipo_terceroControlador')->middleware('permission:list tipo_tercero');
Route::resource('users','App\Http\Controllers\UsersControlador')->middleware('permission:list usuarios');
Route::resource('roles','App\Http\Controllers\RolesControlador')->middleware('permission:list roles');

//Reportes
Route::get('anotacion_report','App\Http\Controllers\AnotacionControlador@report')->middleware('permission:report anotacion');
Route::get('antiguedad_report','App\Http\Controllers\AntiguedadControlador@report')->middleware('permission:report antiguedad');
Route::get('asignatura_report','App\Http\Controllers\AsignaturaControlador@report')->middleware('permission:report asignatura');
Route::get('asistencia_report','App\Http\Controllers\AsistenciaControlador@report')->middleware('permission:report asistencia');
Route::get('asistencia_servicio_social_report','App\Http\Controllers\Asistencia_servicio_socialControlador@report')->middleware('permission:report asistencia_servicio_social_report');
Route::get('brigada_report','App\Http\Controllers\BrigadaControlador@report')->middleware('permission:report brigada');
Route::get('calificacion_report','App\Http\Controllers\CalificacionControlador@report')->middleware('permission:report calificacion');
Route::get('calificacion_create','App\Http\Controllers\CalificacionControlador@create')->middleware('permission:report calificacion');

Route::get('cargo_report','App\Http\Controllers\CargoControlador@report')->middleware('permission:report cargo');
Route::get('colegio_report','App\Http\Controllers\ColegioControlador@report')->middleware('permission:report colegio');
Route::get('curso_report','App\Http\Controllers\CursoControlador@report')->middleware('permission:report curso');
Route::get('cursoxrango_report','App\Http\Controllers\CursoxrangoControlador@report')->middleware('permission:report cursoxrango');
Route::get('curso_colegio_report','App\Http\Controllers\Curso_colegioControlador@report')->middleware('permission:report curso_colegio');
Route::get('departamento_nacimiento_report','App\Http\Controllers\Departamento_nacimientoControlador@report')->middleware('permission:report departamento_nacimiento');
Route::get('departamento_residencia_report','App\Http\Controllers\Departamento_residenciaControlador@report')->middleware('permission:report departamento_residencia');
Route::get('equipo_report','App\Http\Controllers\EquipoControlador@report')->middleware('permission:report equipo');
Route::get('estado_report','App\Http\Controllers\EstadoControlador@report')->middleware('permission:report estado');
Route::get('estado_asistencia_report','App\Http\Controllers\Estado_asistenciaControlador@report')->middleware('permission:report estado_asistencia');
Route::get('estado_equipo_report','App\Http\Controllers\Estado_equipoControlador@report')->middleware('permission:report estado_equipo');
Route::get('estado_jefatura_report','App\Http\Controllers\Estado_jefaturaControlador@report')->middleware('permission:report estado_jefatur');
Route::get('estado_matricula_report','App\Http\Controllers\Estado_matriculaControlador@report')->middleware('permission:report estado_matricula');
Route::get('falta_report','App\Http\Controllers\FaltaControlador@report')->middleware('permission:report falta');
Route::get('instructor_report','App\Http\Controllers\InstructorControlador@report')->middleware('permission:report instructor');
Route::get('instructoresxcurso_report','App\Http\Controllers\InstructoresxcursoControlador@report')->middleware('permission:report instructoresxcurso');
Route::get('jefatura_report','App\Http\Controllers\JefaturaControlador@report')->middleware('permission:report jefatura');
Route::get('jornada_report','App\Http\Controllers\JornadaControlador@report')->middleware('permission:report jornada');
Route::get('localidad_report','App\Http\Controllers\LocalidadControlador@report')->middleware('permission:report localidad');
Route::get('matricular_report','App\Http\Controllers\MatricularControlador@report')->middleware('permission:report matricular');
Route::get('nivel_academico_report','App\Http\Controllers\Nivel_academicoControlador@report')->middleware('permission:report nivel_academico');
Route::get('peloton_report','App\Http\Controllers\PelotonControlador@report')->middleware('permission:report peloton');
Route::get('prestamo_equipo_report','App\Http\Controllers\Prestamo_equipoControlador@report')->middleware('permission:report prestamo_equipo');
Route::get('profesion_report','App\Http\Controllers\ProfesionControlador@report')->middleware('permission:report profesion');
Route::get('proveedor_report','App\Http\Controllers\ProveedorControlador@report')->middleware('permission:report proveedor');
Route::get('puesto_report','App\Http\Controllers\PuestoControlador@report')->middleware('permission:report puesto');
Route::get('rango_report','App\Http\Controllers\RangoControlador@report')->middleware('permission:report rango');
Route::get('rh_report','App\Http\Controllers\RhControlador@report')->middleware('permission:report rh');
Route::get('seccional_report','App\Http\Controllers\SeccionalControlador@report')->middleware('permission:report seccional');
Route::get('semestre_report','App\Http\Controllers\SemestreControlador@report')->middleware('permission:report semestre');
Route::get('servicio_social_report','App\Http\Controllers\Servicio_socialControlador@report')->middleware('permission:report servicio_social');
Route::get('servicio_social_certificado','App\Http\Controllers\Servicio_socialControlador@indexCertificados')->middleware('permission:emitir certificados');
Route::get('servicio_social_certificado/{id}','App\Http\Controllers\Servicio_socialControlador@certificado')->middleware('permission:emitir certificados');
Route::patch('servicio_social_habilitar/{id}','App\Http\Controllers\Servicio_socialControlador@habilitar');
Route::get('tablas_report','App\Http\Controllers\TablasControlador@report')->middleware('permission:report tablas');
Route::get('tercero_report','App\Http\Controllers\TerceroControlador@report')->middleware('permission:report tercero');
Route::get('tipo_anotacion_report','App\Http\Controllers\Tipo_anotacionControlador@report')->middleware('permission:report tipo_anotacion');
Route::get('tipo_documento_report','App\Http\Controllers\Tipo_documentoControlador@report')->middleware('permission:report tipo_documento');
Route::get('tipo_tercero_report','App\Http\Controllers\Tipo_terceroControlador@report')->middleware('permission:report tipo_tercero');
Route::get('users_report','App\Http\Controllers\UsersControlador@report')->middleware('permission:report usuarios');
Route::get('asistencia_servicio_social_report','App\Http\Controllers\Asistencia_servicio_socialControlador@report')->middleware('permission:report asistencia_servicio_social');

Route::post('prestamo_equipo_devolver/{idPrestamoEquipo}','App\Http\Controllers\Prestamo_equipoControlador@devolver')->middleware('permission:edit prestamo_equipo');
Route::get('/getJefatura/{id}','App\Http\Controllers\JefaturaControlador@getJefatura')->middleware('permission:list jefatura');
    


Route::get('storage-link',function(){
    Artisan::call('storage:link');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
