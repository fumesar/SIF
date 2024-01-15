@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Curso_colegio @can('create curso_colegio')<a href="curso_colegio/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('curso_colegio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Curso Col</th>
					<th>Curso</th>
					<th>Opciones</th>
				</thead>
               @foreach ($curso_colegios as $curso_colegio)
				<tr>
					
					<td>{{ $curso_colegio->idCursoCol}}</td>
					<td>{{ $curso_colegio->Curso}}</td>
					<td>
						@can('edit curso_colegio')
						<a href="{{URL::action('App\Http\Controllers\Curso_colegioControlador@edit',$curso_colegio->idCursoCol)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete curso_colegio')
                        <a href="" data-target="#modal-delete-{{$curso_colegio->idCursoCol}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show curso_colegio')
                        <a href="{{URL::action('App\Http\Controllers\Curso_colegioControlador@show',$curso_colegio->idCursoCol)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('curso_colegio.modal')
				@endforeach
			</table>
		</div>
		{{$curso_colegios->render()}}
	</div>
</div>

@endsection