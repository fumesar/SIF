<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema De Informacion Fumesar (SIF)</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

    <!-- Incrustación -->
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="{{asset('template/dataTables-export/datatables_custom/main.css')}}">  
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/dataTables-export/datatables_custom/datatables/datatables.min.css')}}">
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="{{asset('template/dataTables-export/datatables_custom/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">
    <!-- Fin Incrustación -->
    <!-- Iconos de Fumesar -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Fu</b>@</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Fumesar</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            @canany(['list jefatura','report jefatura'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-JEFATURA"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span></span>
                <span class="mls">JEFATURA</span>

                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                   @can('list jefatura')
                   <li><a href="{{URL::action('App\Http\Controllers\JefaturaControlador@index')}}"><i class="fa fa-male"></i> INGRESAR</a></li>
                   @endcan
                   @can('report jefatura')
                    <li><a href="{{URL::action('App\Http\Controllers\JefaturaControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                   @endcan 
                   @can('list asistencia_servicio_social')
                    <li><a href="{{URL::action('App\Http\Controllers\Asistencia_servicio_socialControlador@index')}}"><i class="fa fa-male"></i> INGRESAR ASISTENCIA</a></li>
                    @endcan
                    @can('report asistencia_servicio_social')
                    <li><a href="{{URL::action('App\Http\Controllers\Asistencia_servicio_socialControlador@report')}}"><i class="fa fa-male"></i> REPORTE ASISTENCIA</a></li>
                    @endcan
              </ul>
            </li>
            @endcanany
             
            @canany(['list servicio_social','report servicio_social','list asistencia_servicio_social','report asistencia_servicio_social']) 
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-SERVICIO-SOCIAL"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
                <span class="mls">SERVICIO SOCIAL</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list servicio_social')
                   <li><a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@index')}}"><i class="fa fa-male"></i> INGRESAR</a></li>
                   @endcan
                   @can('report servicio_social')
                    <li><a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                    @endcan
                    @can('list asistencia_servicio_social')
                    <li><a href="{{URL::action('App\Http\Controllers\Asistencia_servicio_socialControlador@index')}}"><i class="fa fa-male"></i> INGRESAR ASISTENCIA</a></li>
                    @endcan
                    @can('report asistencia_servicio_social')
                    <li><a href="{{URL::action('App\Http\Controllers\Asistencia_servicio_socialControlador@report')}}"><i class="fa fa-male"></i> REPORTE ASISTENCIA</a></li>
                    @endcan
              </ul>
            </li>
            @endcanany
            @canany(['list proveedor','report proveedor'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-PROVEEDORES"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="mls">PROVEEDORES</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list proveedor')
                   <li><a href="{{URL::action('App\Http\Controllers\ProveedorControlador@index')}}"><i class="fa fa-male"></i> INGRESAR</a></li>
                   @endcan
                   @can('report proveedor')
                    <li><a href="{{URL::action('App\Http\Controllers\ProveedorControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                   @endcan 
              </ul>
            </li>
            @endcanany
            @canany(['list tercero','report tercero'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-TERCEROS"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
                <span class="mls">TERCEROS</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list tercero')
                   <li><a href="{{URL::action('App\Http\Controllers\TerceroControlador@index')}}"><i class="fa fa-male"></i> INGRESAR</a></li>
                   @endcan
                   @can('report tercero')
                    <li><a href="{{URL::action('App\Http\Controllers\TerceroControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                    @endcan
              </ul>
            </li>
            @endcanany
            @canany(['list instructor','report instructor'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-INSTRUCTOR"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                <span class="mls">INSTRUCTORES</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list instructor')
                   <li><a href="{{URL::action('App\Http\Controllers\InstructorControlador@index')}}"><i class="fa fa-male"></i> INGRESAR</a></li>
                   @endcan
                   @can('report instructor')
                    <li><a href="{{URL::action('App\Http\Controllers\InstructorControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                    @endcan
              </ul>
            </li>
            @endcanany
            @canany(['list anotacion','report anotacion'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-FOLIO-DE-VIDA"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                <span class="mls">FOLIOS DE VIDA</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list anotacion')
                   <li><a href="{{URL::action('App\Http\Controllers\AnotacionControlador@index')}}"><i class="fa fa-male"></i> INGRESAR ANOTACION</a></li>
                   @endcan
                   @can('report anotacion')
                    <li><a href="{{URL::action('App\Http\Controllers\AnotacionControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                  @endcan 
              </ul>
            </li>
            @endcanany
            @canany(['list matricular','list curso','list asignatura','list semestre'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-GESTIONAR"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                <span class="mls">GESTIONAR</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list matricular')
                   <li><a href="{{URL::action('App\Http\Controllers\MatricularControlador@index')}}"><i class="fa fa-male"></i> MATRICULAR</a></li>
                   @endcan
                   @can('list curso')
                    <li><a href="{{URL::action('App\Http\Controllers\CursoControlador@index')}}"><i class="fa fa-male"></i> CURSOS</a></li>
                    @endcan
                    @can('list asignatura')
                    <li><a href="{{URL::action('App\Http\Controllers\AsignaturaControlador@index')}}"><i class="fa fa-male"></i> ASIGNATURA</a></li>
                    @endcan
                    @can('list semestre')
                    <li><a href="{{URL::action('App\Http\Controllers\SemestreControlador@index')}}"><i class="fa fa-male"></i> SEMESTRE</a></li>
                    @endcan
              </ul>
            </li>
            @endcanany
            @canany(['list calificacion','report calificacion'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-CALIFICACIONES"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                <span class="mls">CALIFICACIONES</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list calificacion')
                   <li><a href="{{URL::action('App\Http\Controllers\CalificacionControlador@index')}}"><i class="fa fa-male"></i> INGRESAR</a></li>
                   @endcan
                   @can('report calificacion')
                    <li><a href="{{URL::action('App\Http\Controllers\CalificacionControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                   @endcan
              </ul>
            </li>
            @endcanany
            @canany(['list asistencia','report asistencia'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-ASISENCIA"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
                <span class="mls">ASISTENCIA</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list asistencia')
                   <li><a href="{{URL::action('App\Http\Controllers\AsistenciaControlador@index')}}"><i class="fa fa-male"></i> INGRESAR</a></li>
                   @endcan
                   @can('report asistencia')
                    <li><a href="{{URL::action('App\Http\Controllers\AsistenciaControlador@report')}}"><i class="fa fa-male"></i> REPORTE</a></li>
                   @endcan 
              </ul>
            </li>
            @endcanany
            @canany(['list equipo','list prestamo_equipo'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-INVENTARIO"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span></span>
                <span class="mls">INVENTARIO</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list equipo')
                   <li><a href="{{URL::action('App\Http\Controllers\EquipoControlador@index')}}"><i class="fa fa-male"></i> EQUIPOS</a></li>
                   @endcan
                   @can('list prestamo_equipo')
                    <li><a href="{{URL::action('App\Http\Controllers\Prestamo_equipoControlador@index')}}"><i class="fa fa-male"></i> 
                    PRESTAMOS</a></li>
                   @endcan 
              </ul>
            </li>
            @endcanany
            @canany(['emitir certificados'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-CERTIFICADOS"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></span>
                <span class="mls">CERTIFICADOS</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('emitir certificados')
                   <li><a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@indexCertificados')}}"><i class="fa fa-male"></i> SERVICIO SOCIAL</a></li>
                   @endcan 
              </ul>
            </li>
            @endcanany
            @canany(['list matricular','list curso','list asignatura','list semestre'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-GESTIONAR"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                <span class="mls">INGRESOS Y GASTOS</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list matricular')
                   <li><a href="{{URL::action('App\Http\Controllers\MatricularControlador@index')}}"><i class="fa fa-male"></i> INGRESOS</a></li>
                   @endcan
              </ul>
            </li>
            @endcanany
            @canany(['list brigada','list cargo','list colegio','list curso_colegio','list departamento_nacimiento','list departamento_residencia','list equipo','list estado','list estado_equipo','list estado_jefatura','list estado_matricula','list falta','list jornada','list localidad','list nivel_academico','list peloton','list puesto','list rango','list rh','list seccional','list tipo_anotacion','list tipo_documento','list tipo_tercero','list tablas','list estado','list estado_equipo','list instructoresxcurso'])
            <li class="treeview">
              <a href="#">
                <span class="icon-FUMESAR-ICONOS-ADMINISTRADOR"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="mls"> ADMINISTRADOR</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('list brigada')
                   <li><a href="{{URL::action('App\Http\Controllers\BrigadaControlador@index')}}"><i class="fa fa-table"></i> BRIGADA</a></li>
                   @endcan
                   @can('list cargo')
                    <li><a href="{{URL::action('App\Http\Controllers\CargoControlador@index')}}"><i class="fa fa-table"></i> CARGO</a></li>
                    @endcan
                    @can('list colegio')
                    <li><a href="{{URL::action('App\Http\Controllers\ColegioControlador@index')}}"><i class="fa fa-table"></i> COLEGIO</a></li>
                    @endcan
                    @can('list curso_colegio')
                    <li><a href="{{URL::action('App\Http\Controllers\Curso_colegioControlador@index')}}"><i class="fa fa-table"></i> CURSOS COLEGIO</a></li>
                    @endcan
                    @can('list departamento_nacimiento')
                    <li><a href="{{URL::action('App\Http\Controllers\Departamento_nacimientoControlador@index')}}"><i class="fa fa-table"></i> DEPARTAMENTO NACIMIENTO</a></li>
                    @endcan
                    @can('list departamento_residencia')
                    <li><a href="{{URL::action('App\Http\Controllers\Departamento_residenciaControlador@index')}}"><i class="fa fa-table"></i> DEPARTAMENTO RESIDENCIA</a></li>
                    @endcan
                    @can('list equipo')
                    <li><a href="{{URL::action('App\Http\Controllers\EquipoControlador@index')}}"><i class="fa fa-table"></i> EQUIPO</a></li>
                    @endcan
                    @can('list estado')
                    <li><a href="{{URL::action('App\Http\Controllers\EstadoControlador@index')}}"><i class="fa fa-table"></i> ESTADO</a></li>
                    @endcan
                    @can('list estado_equipo')
                    <li><a href="{{URL::action('App\Http\Controllers\Estado_equipoControlador@index')}}"><i class="fa fa-table"></i> ESTADOEQUIPO</a></li>
                    @endcan
                    @can('list estado_jefatura')
                    <li><a href="{{URL::action('App\Http\Controllers\Estado_jefaturaControlador@index')}}"><i class="fa fa-table"></i> ESTADO JEFATURA</a></li>
                    @endcan
                    @can('list estado_matricula')
                    <li><a href="{{URL::action('App\Http\Controllers\Estado_matriculaControlador@index')}}"><i class="fa fa-table"></i> ESTADOMATRICULA</a></li>
                    @endcan
                    @can('list falta')
                    <li><a href="{{URL::action('App\Http\Controllers\FaltaControlador@index')}}"><i class="fa fa-table"></i> FALTA</a></li>
                    @endcan
                    @can('list jornada')
                    <li><a href="{{URL::action('App\Http\Controllers\JornadaControlador@index')}}"><i class="fa fa-table"></i> JORNADA</a></li>
                    @endcan
                    @can('list localidad')
                    <li><a href="{{URL::action('App\Http\Controllers\LocalidadControlador@index')}}"><i class="fa fa-table"></i> LOCALIDAD</a></li>
                    @endcan
                    @can('list nivel_academico')
                    <li><a href="{{URL::action('App\Http\Controllers\Nivel_academicoControlador@index')}}"><i class="fa fa-table"></i> NIVEL ACADEMICO</a></li>
                    @endcan
                    @can('list peloton')
                    <li><a href="{{URL::action('App\Http\Controllers\PelotonControlador@index')}}"><i class="fa fa-table"></i> PELOTON</a></li>
                    @endcan
                    @can('list puesto')
                    <li><a href="{{URL::action('App\Http\Controllers\PuestoControlador@index')}}"><i class="fa fa-table"></i> PUESTO</a></li>
                    @endcan
                    @can('list rango')
                    <li><a href="{{URL::action('App\Http\Controllers\RangoControlador@index')}}"><i class="fa fa-table"></i> RANGOS</a></li>
                    @endcan
                    @can('list rh')
                    <li><a href="{{URL::action('App\Http\Controllers\RhControlador@index')}}"><i class="fa fa-table"></i> RH</a></li>
                    @endcan
                    @can('list seccional')
                    <li><a href="{{URL::action('App\Http\Controllers\SeccionalControlador@index')}}"><i class="fa fa-table"></i> SECCIONAL</a></li>
                    @endcan
                    @can('list tipo_anotacion')
                    <li><a href="{{URL::action('App\Http\Controllers\Tipo_anotacionControlador@index')}}"><i class="fa fa-table"></i> TIPO ANOTACION</a></li>
                    @endcan
                    @can('list tipo_documento')
                    <li><a href="{{URL::action('App\Http\Controllers\Tipo_documentoControlador@index')}}"><i class="fa fa-table"></i> TIPO DOCUMENTO</a></li>
                    @endcan
                    @can('list tipo_tercero')
                    <li><a href="{{URL::action('App\Http\Controllers\Tipo_terceroControlador@index')}}"><i class="fa fa-table"></i> TIPO TERCERO</a></li>
                    @endcan
                    @can('list tablas')
                    <li><a href="{{URL::action('App\Http\Controllers\TablasControlador@index')}}"><i class="fa fa-table"></i> TABLAS</a></li>
                    @endcan
                    @can('list estado')
                    <li><a href="{{URL::action('App\Http\Controllers\EstadoControlador@index')}}"><i class="fa fa-table"></i> ESTADO</a></li>
                    @endcan
                    @can('list estado_equipo')
                    <li><a href="{{URL::action('App\Http\Controllers\Estado_equipoControlador@index')}}"><i class="fa fa-table"></i> 
                    ESTADOEQUIPO</a></li>
                    @endcan
                    @can('list instructoresxcurso')
                    <li><a href="{{URL::action('App\Http\Controllers\InstructoresxcursoControlador@index')}}"><i class="fa fa-table"></i> INSTRUCTORES POR CURSO</a></li>
                    @endcan
                    <!-- <li><a href="{{URL::action('App\Http\Controllers\Estado_asistenciaControlador@index')}}"><i class="fa fa-table"></i> ESTADO ASISTENCIA</a></li> -->
                    
              </ul>
            </li>
           
            @endcanany
           
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>ADMINISTRADOR-u</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                   <li><a href="{{URL::action('App\Http\Controllers\UsersControlador@index')}}"><i class="fa fa-male"></i> Usuarios</a></li>
                    
              </ul>
            </li> --> 
            @canany(['report anotacion','report antiguedad','report asignatura','report asistencia','report asistencia_servicio_social','report brigada','report calificacion','report cargo','report colegio','report curso','report curso_colegio','report cursoxrango','report departamento_nacimiento','report departamento_residencia','report equipo','report estado','report estado_asistencia','report estado_equipo','report estado_jefatura','report estado_matricula','report falta','report instructor','report instructoresxcurso','report jefatura','report jornada','report localidad','report matricular','report model_has_permissions','report model_has_roles','report nivel_academico','report peloton','report permissions','report prestamo_equipo','report profesion','report proveedor','report puesto','report rango','report rh','report role_has_permissions','report roles','report seccional','report semestre','report servicio_social','report tablas','report tercero','report tiempo_rango','report tipo_anotacion','report tipo_documento','report tipo_tercero','report usuarios'])
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('report anotacion')
                <li><a href="{{URL::action('App\Http\Controllers\AnotacionControlador@report')}}"><i class="fa fa-file-text-o"></i> Anotacion(s)</a></li>
                @endcan
                @can('report antiguedad')
                <li><a href="{{URL::action('App\Http\Controllers\AntiguedadControlador@report')}}"><i class="fa fa-file-text-o"></i> Antiguedad(s)</a></li>
                @endcan
                @can('report asignatura')
                <li><a href="{{URL::action('App\Http\Controllers\AsignaturaControlador@report')}}"><i class="fa fa-file-text-o"></i> Asignatura(s)</a></li>
                @endcan
                @can('report asistencia')
                <li><a href="{{URL::action('App\Http\Controllers\AsistenciaControlador@report')}}"><i class="fa fa-file-text-o"></i> Asistencia(s)</a></li>
                @endcan
                @can('report asistencia_servicio_social')
                <li><a href="{{URL::action('App\Http\Controllers\Asistencia_servicio_socialControlador@report')}}"><i class="fa fa-file-text-o"></i> Asistencia_servicio_social(s)</a></li>
                @endcan
                @can('report brigada')
                <li><a href="{{URL::action('App\Http\Controllers\BrigadaControlador@report')}}"><i class="fa fa-file-text-o"></i> Brigada(s)</a></li>
                @endcan
                @can('report calificacion')
                <li><a href="{{URL::action('App\Http\Controllers\CalificacionControlador@report')}}"><i class="fa fa-file-text-o"></i> Calificacion(s)</a></li>
                @endcan
                @can('report cargo')
                <li><a href="{{URL::action('App\Http\Controllers\CargoControlador@report')}}"><i class="fa fa-file-text-o"></i> Cargo(s)</a></li>
                @endcan
                @can('report colegio')
                <li><a href="{{URL::action('App\Http\Controllers\ColegioControlador@report')}}"><i class="fa fa-file-text-o"></i> Colegio(s)</a></li>
                @endcan
                @can('report curso')
                <li><a href="{{URL::action('App\Http\Controllers\CursoControlador@report')}}"><i class="fa fa-file-text-o"></i> Curso(s)</a></li>
                @endcan
                @can('report cursoxrango')
                <li><a href="{{URL::action('App\Http\Controllers\CursoxrangoControlador@report')}}"><i class="fa fa-file-text-o"></i> Cursoxrango(s)</a></li>
                @endcan
                @can('report curso_colegio')
                <li><a href="{{URL::action('App\Http\Controllers\Curso_colegioControlador@report')}}"><i class="fa fa-file-text-o"></i> Curso_colegio(s)</a></li>
                @endcan
                @can('report departamento_nacimiento')
                <li><a href="{{URL::action('App\Http\Controllers\Departamento_nacimientoControlador@report')}}"><i class="fa fa-file-text-o"></i> Departamento_nacimiento(s)</a></li>
                @endcan
                @can('report departamento_residencia')
                <li><a href="{{URL::action('App\Http\Controllers\Departamento_residenciaControlador@report')}}"><i class="fa fa-file-text-o"></i> Departamento_residencia(s)</a></li>
                @endcan
                @can('report equipo')
                <li><a href="{{URL::action('App\Http\Controllers\EquipoControlador@report')}}"><i class="fa fa-file-text-o"></i> Equipo(s)</a></li>
                @endcan
                @can('report estado')
                <li><a href="{{URL::action('App\Http\Controllers\EstadoControlador@report')}}"><i class="fa fa-file-text-o"></i> Estado(s)</a></li>
                @endcan
                @can('report estado_asistencia')
                <li><a href="{{URL::action('App\Http\Controllers\Estado_asistenciaControlador@report')}}"><i class="fa fa-file-text-o"></i> Estado_asistencia(s)</a></li>
                @endcan
                @can('report estado_equipo')
                <li><a href="{{URL::action('App\Http\Controllers\Estado_equipoControlador@report')}}"><i class="fa fa-file-text-o"></i> Estado_equipo(s)</a></li>
                @endcan
                @can('report estado_jefatura')
                <li><a href="{{URL::action('App\Http\Controllers\Estado_jefaturaControlador@report')}}"><i class="fa fa-file-text-o"></i> Estado_jefatura(s)</a></li>
                @endcan
                @can('report estado_matricula')
                <li><a href="{{URL::action('App\Http\Controllers\Estado_matriculaControlador@report')}}"><i class="fa fa-file-text-o"></i> Estado_matricula(s)</a></li>
                @endcan
                @can('report falta')
                <li><a href="{{URL::action('App\Http\Controllers\FaltaControlador@report')}}"><i class="fa fa-file-text-o"></i> Falta(s)</a></li>
                @endcan
                @can('report instructor')
                <li><a href="{{URL::action('App\Http\Controllers\InstructorControlador@report')}}"><i class="fa fa-file-text-o"></i> Instructor(s)</a></li>
                @endcan
                @can('report instructorxcurso')
                <li><a href="{{URL::action('App\Http\Controllers\InstructoresxcursoControlador@report')}}"><i class="fa fa-file-text-o"></i> Instructoresxcurso(s)</a></li>
                @endcan
                @can('report jefatura')
                <li><a href="{{URL::action('App\Http\Controllers\JefaturaControlador@report')}}"><i class="fa fa-file-text-o"></i> Jefatura(s)</a></li>
                @endcan
                @can('report jornada')
                <li><a href="{{URL::action('App\Http\Controllers\JornadaControlador@report')}}"><i class="fa fa-file-text-o"></i> Jornada(s)</a></li>
                @endcan
                @can('report localidad')
                <li><a href="{{URL::action('App\Http\Controllers\LocalidadControlador@report')}}"><i class="fa fa-file-text-o"></i> Localidad(s)</a></li>
                @endcan
                @can('report matricular')
                <li><a href="{{URL::action('App\Http\Controllers\MatricularControlador@report')}}"><i class="fa fa-file-text-o"></i> Matricular(s)</a></li>
                @endcan
                @can('report nivel_academico')
                <li><a href="{{URL::action('App\Http\Controllers\Nivel_academicoControlador@report')}}"><i class="fa fa-file-text-o"></i> Nivel_academico(s)</a></li>
                @endcan
                @can('report peloton')
                <li><a href="{{URL::action('App\Http\Controllers\PelotonControlador@report')}}"><i class="fa fa-file-text-o"></i> Peloton(s)</a></li>
                @endcan
                @can('report prestamo_equipo')
                <li><a href="{{URL::action('App\Http\Controllers\Prestamo_equipoControlador@report')}}"><i class="fa fa-file-text-o"></i> Prestamo_equipo(s)</a></li>
                @endcan
                @can('report profesion')
                <li><a href="{{URL::action('App\Http\Controllers\ProfesionControlador@report')}}"><i class="fa fa-file-text-o"></i> Profesion(s)</a></li>
                @endcan
                @can('report proveedor')
                <li><a href="{{URL::action('App\Http\Controllers\ProveedorControlador@report')}}"><i class="fa fa-file-text-o"></i> Proveedor(s)</a></li>
                @endcan
                @can('report puesto')
                <li><a href="{{URL::action('App\Http\Controllers\PuestoControlador@report')}}"><i class="fa fa-file-text-o"></i> Puesto(s)</a></li>
                @endcan
                @can('report rango')
                <li><a href="{{URL::action('App\Http\Controllers\RangoControlador@report')}}"><i class="fa fa-file-text-o"></i> Rango(s)</a></li>
                @endcan
                @can('report rh')
                <li><a href="{{URL::action('App\Http\Controllers\RhControlador@report')}}"><i class="fa fa-file-text-o"></i> Rh(s)</a></li>
                @endcan
                @can('report seccional')
                <li><a href="{{URL::action('App\Http\Controllers\SeccionalControlador@report')}}"><i class="fa fa-file-text-o"></i> Seccional(s)</a></li>
                @endcan
                @can('report semestre')
                <li><a href="{{URL::action('App\Http\Controllers\SemestreControlador@report')}}"><i class="fa fa-file-text-o"></i> Semestre(s)</a></li>
                @endcan
                @can('report servicio_social')
                <li><a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@report')}}"><i class="fa fa-file-text-o"></i> Servicio_social(s)</a></li>
                @endcan
                @can('report tablas')
                <li><a href="{{URL::action('App\Http\Controllers\TablasControlador@report')}}"><i class="fa fa-file-text-o"></i> Tablas(s)</a></li>
                @endcan
                @can('report tercero')
                <li><a href="{{URL::action('App\Http\Controllers\TerceroControlador@report')}}"><i class="fa fa-file-text-o"></i> Tercero(s)</a></li>
                @endcan
                @can('report tipo_anotacion')
                <li><a href="{{URL::action('App\Http\Controllers\Tipo_anotacionControlador@report')}}"><i class="fa fa-file-text-o"></i> Tipo_anotacion(s)</a></li>
                @endcan
                @can('report tipo_documento')
                <li><a href="{{URL::action('App\Http\Controllers\Tipo_documentoControlador@report')}}"><i class="fa fa-file-text-o"></i> Tipo_documento(s)</a></li>
                @endcan
                @can('report tipo_tercero')
                <li><a href="{{URL::action('App\Http\Controllers\Tipo_terceroControlador@report')}}"><i class="fa fa-file-text-o"></i> Tipo_tercero(s)</a></li>
                @endcan
                @can('report usuarios')
                <li><a href="{{URL::action('App\Http\Controllers\UsersControlador@report')}}"><i class="fa fa-file-text-o"></i> Users(s)</a></li>
                @endcan
              </ul>
            </li>
            @endcanany
            @can('list usuarios')       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @can('list usuarios')
                <li><a href="usuario"><i class="fa fa-users"></i> Usuarios</a></li>
                @endcan
                <li><a href="roles"><i class="fa fa-users"></i> Roles</a></li>
              </ul>
            </li>
            @endcan

             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema De Informacion Fumesar (SIF)</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2024
        </div>
        <strong>Copyright &copy; 2024 <a href="#"></a></strong> All rights reserved
      </footer>
      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- <script src="{{asset('js/bootstrap-select.min.js')}}"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
    <!-- Incrustracion -->
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <!-- <script src="{{asset('template/dataTables-export/datatables_custom/jquery/jquery-3.3.1.min.js')}}"></script> -->   
    <script src="{{asset('template/dataTables-export/datatables_custom/popper/popper.min.js')}}"></script>
    <!-- <script src="{{asset('template/dataTables-export/datatables_custom/bootstrap/js/bootstrap.min.js')}}"></script> -->
      
    <!-- datatables JS -->
    <script type="text/javascript" src="{{asset('template/dataTables-export/datatables_custom/datatables/datatables.min.js')}}"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>  
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>    
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>    
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="{{asset('template/dataTables-export/datatables_custom/main.js')}}"></script>
    <!-- Fin Incrustracion -->
  </body>
</html>
