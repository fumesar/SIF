@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estado @can('create estado')<a href="estado/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('estado.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Estado</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($estados as $estado)
				<tr>
					
					<td>{{ $estado->idEstado}}</td>
					<td>{{ $estado->Estado}}</td>
					<td>
						@can('edit estado')
						<a href="{{URL::action('App\Http\Controllers\EstadoControlador@edit',$estado->idEstado)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete estado')
                        <a href="" data-target="#modal-delete-{{$estado->idEstado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show estado')
                        <a href="{{URL::action('App\Http\Controllers\EstadoControlador@show',$estado->idEstado)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('estado.modal')
				@endforeach
			</table>
		</div>
		{{$estados->render()}}
	</div>
</div>

@endsection