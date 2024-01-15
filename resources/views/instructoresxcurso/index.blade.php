@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Instructoresxcurso @can('create instructoresxcurso')<a href="instructoresxcurso/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('instructoresxcurso.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Instructoresx Curso</th>
					<th>Instructor</th>
					<th>Curso</th>
					<th>Opciones</th>
				</thead>
               @foreach ($instructoresxcursos as $instructoresxcurso)
				<tr>
					
					<td>{{ $instructoresxcurso->idInstructoresxCurso}}</td>
					<td>{{ $instructoresxcurso->instructor}}</td>
					<td>{{ $instructoresxcurso->curso}}</td>
					<td>
						@can('edit instructoresxcurso')
						<a href="{{URL::action('App\Http\Controllers\InstructoresxcursoControlador@edit',$instructoresxcurso->idInstructoresxCurso)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete instructoresxcurso')
                        <a href="" data-target="#modal-delete-{{$instructoresxcurso->idInstructoresxCurso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show instructoresxcurso')
                        <a href="{{URL::action('App\Http\Controllers\InstructoresxcursoControlador@show',$instructoresxcurso->idInstructoresxCurso)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('instructoresxcurso.modal')
				@endforeach
			</table>
		</div>
		{{$instructoresxcursos->render()}}
	</div>
</div>

@endsection