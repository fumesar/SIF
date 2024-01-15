@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Calificacion @can('create calificacion')<a href="calificacion/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Calificacion</th>
					<th>Semestre</th>
					<th>Curso</th>
					<th>Asignatura</th>
					<th>Jefatura</th>
					<th>Nota</th>
					<th>Promedio</th>
					<th>Opciones</th>
				</thead>
               @foreach ($calificacions as $calificacion)
				<tr>
					
					<td>{{ $calificacion->idCalificacion}}</td>
					<td>{{ $calificacion->semestre}}</td>
					<td>{{ $calificacion->curso}}</td>
					<td>{{ $calificacion->asignatura}}</td>
					<td>{{ $calificacion->jefatura}}</td>
					<td>{{ $calificacion->Nota}}</td>
					<td>{{ $calificacion->Promedio}}</td>
					<td>
						@can('edit calificacion')
						<a href="{{URL::action('App\Http\Controllers\CalificacionControlador@edit',$calificacion->idCalificacion)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete calificacion')
                        <a href="" data-target="#modal-delete-{{$calificacion->idCalificacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show calificacion')
                        <a href="{{URL::action('App\Http\Controllers\CalificacionControlador@show',$calificacion->idCalificacion)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('calificacion.modal')
				@endforeach
			</table>
		</div>
		{{$calificacions->render()}}
	</div>
</div>

@endsection