@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Estado Equipo @can('create estado_equipo')<a href="estado_equipo/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('estado_equipo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Estado Equipo</th>
					<th>Estado Equipo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($estado_equipos as $estado_equipo)
				<tr>
					
					<td>{{ $estado_equipo->idEstadoEquipo}}</td>
					<td>{{ $estado_equipo->EstadoEquipo}}</td>
					<td>
						@can('edit estado_equipo')
						<a href="{{URL::action('App\Http\Controllers\Estado_equipoControlador@edit',$estado_equipo->idEstadoEquipo)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete estado_equipo')
                        <a href="" data-target="#modal-delete-{{$estado_equipo->idEstadoEquipo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show estado_equipo')
                        <a href="{{URL::action('App\Http\Controllers\Estado_equipoControlador@show',$estado_equipo->idEstadoEquipo)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('estado_equipo.modal')
				@endforeach
			</table>
		</div>
		{{$estado_equipos->render()}}
	</div>
</div>

@endsection