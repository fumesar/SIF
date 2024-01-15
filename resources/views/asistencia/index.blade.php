@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Asistencia @can('create asistencia')<a href="asistencia/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('asistencia.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Asistencia</th>
					<th>Curso</th>
					<th>Fecha</th>
					<th>Matricular</th>
					<th>Estado Asistencia</th>
					<th>Opciones</th>
				</thead>
               @foreach ($asistencias as $asistencia)
				<tr>
					
					<td>{{ $asistencia->idAsistencia}}</td>
					<td>{{ $asistencia->curso}}</td>
					<td>{{ $asistencia->Fecha}}</td>
					<td>{{ $asistencia->matricular}}</td>
					<td>{{ $asistencia->estado_asistencia}}</td>
					<td>
						<a href="{{URL::action('App\Http\Controllers\AsistenciaControlador@edit',$asistencia->idAsistencia)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$asistencia->idAsistencia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        <a href="{{URL::action('App\Http\Controllers\AsistenciaControlador@show',$asistencia->idAsistencia)}}"><button class="btn btn-success">Ver</button></a>
					</td>
				</tr>
				@include('asistencia.modal')
				@endforeach
			</table>
		</div>
		{{$asistencias->render()}}
	</div>
</div>

@endsection