@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Instructor @can('create instructor')<a href="instructor/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('instructor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Documento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>
               @foreach ($instructors as $instructor)
				<tr>
					
					<td>{{ $instructor->Documento}}</td>
					<td>{{ $instructor->Nombres}}</td>
					<td>{{ $instructor->Apellidos}}</td>
					<td>{{ $instructor->Telefono}}</td>
					<td>
						@can('edit instructor')
						<a href="{{URL::action('App\Http\Controllers\InstructorControlador@edit',$instructor->idinstructor)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete instructor')
                        <a href="" data-target="#modal-delete-{{$instructor->idinstructor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show instructor')
                        <a href="{{URL::action('App\Http\Controllers\InstructorControlador@show',$instructor->idinstructor)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('instructor.modal')
				@endforeach
			</table>
		</div>
		{{$instructors->render()}}
	</div>
</div>

@endsection