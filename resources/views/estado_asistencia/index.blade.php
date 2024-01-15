@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estado_asistencia @can('create estado_asistencia')<a href="estado_asistencia/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('estado_asistencia.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Estado Asistencia</th>
					<th>Estado Asistencia</th>
					<th>Opciones</th>
				</thead>
               @foreach ($estado_asistencias as $estado_asistencia)
				<tr>
					
					<td>{{ $estado_asistencia->idEstadoAsistencia}}</td>
					<td>{{ $estado_asistencia->EstadoAsistencia}}</td>
					<td>
						@can('edit estado_asistencia')
						<a href="{{URL::action('App\Http\Controllers\Estado_asistenciaControlador@edit',$estado_asistencia->idEstadoAsistencia)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete estado_asistencia')
                        <a href="" data-target="#modal-delete-{{$estado_asistencia->idEstadoAsistencia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show estado_asistencia')
                        <a href="{{URL::action('App\Http\Controllers\Estado_asistenciaControlador@show',$estado_asistencia->idEstadoAsistencia)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('estado_asistencia.modal')
				@endforeach
			</table>
		</div>
		{{$estado_asistencias->render()}}
	</div>
</div>

@endsection