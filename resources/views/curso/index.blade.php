@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Curso @can('create curso')<a href="curso/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('curso.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Curso</th>
					<th>Nombre Curso</th>
					<!-- <th>Instructor</th> -->
					<th>Estudiantes</th>
					<th>Semestre</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($cursos as $curso)
				<tr>
					
					<td>{{ $curso->idCurso}}</td>
					<td>{{ $curso->NombreCurso}}</td>
					<!-- <td>Instructor</td> -->
					<td>{{ $curso->conteo}}</td>
					<td>{{ $curso->Semestre}}</td>
					<td>{{ $curso->estado}}</td>
					<td>
						@can('edit curso')
						<a href="{{URL::action('App\Http\Controllers\CursoControlador@edit',$curso->idCurso)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete curso')
                        <a href="" data-target="#modal-delete-{{$curso->idCurso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show curso')
                        <a href="{{URL::action('App\Http\Controllers\CursoControlador@show',$curso->idCurso)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('curso.modal')
				@endforeach
			</table>
		</div>
		{{$cursos->render()}}
	</div>
</div>

@endsection