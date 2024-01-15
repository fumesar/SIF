@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Asignatura @can('create asignatura')<a href="asignatura/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('asignatura.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Asignatura</th>
					<th>Nombre Asignatura</th>
					<th>Curso</th>
					<th>Instructor</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($asignaturas as $asignatura)
				<tr>
					
					<td>{{ $asignatura->idAsignatura}}</td>
					<td>{{ $asignatura->NombreAsignatura}}</td>
					<td>{{ $asignatura->curso}}</td>
					<td>{{ $asignatura->instructor}}</td>
					<td>{{ $asignatura->estado}}</td>
					<td>
						<a href="{{URL::action('App\Http\Controllers\AsignaturaControlador@edit',$asignatura->idAsignatura)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$asignatura->idAsignatura}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        <a href="{{URL::action('App\Http\Controllers\AsignaturaControlador@show',$asignatura->idAsignatura)}}"><button class="btn btn-success">Ver</button></a>
					</td>
				</tr>
				@include('asignatura.modal')
				@endforeach
			</table>
		</div>
		{{$asignaturas->render()}}
	</div>
</div>

@endsection