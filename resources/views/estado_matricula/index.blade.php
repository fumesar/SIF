@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estado_matricula @can('create estado_matricula')<a href="estado_matricula/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('estado_matricula.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Estado Matricula</th>
					<th>Estado Matricula</th>
					<th>Opciones</th>
				</thead>
               @foreach ($estado_matriculas as $estado_matricula)
				<tr>
					
					<td>{{ $estado_matricula->idEstadoMatricula}}</td>
					<td>{{ $estado_matricula->EstadoMatricula}}</td>
					<td>
						@can('edit estado_matricula')
						<a href="{{URL::action('App\Http\Controllers\Estado_matriculaControlador@edit',$estado_matricula->idEstadoMatricula)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete estado_matricula')
                        <a href="" data-target="#modal-delete-{{$estado_matricula->idEstadoMatricula}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show estado_matricula')
                        <a href="{{URL::action('App\Http\Controllers\Estado_matriculaControlador@show',$estado_matricula->idEstadoMatricula)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('estado_matricula.modal')
				@endforeach
			</table>
		</div>
		{{$estado_matriculas->render()}}
	</div>
</div>

@endsection