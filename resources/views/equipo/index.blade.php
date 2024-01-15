@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Equipo @can('create equipo')<a href="equipo/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('equipo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Equipo</th>
					
					<th>Nombre Equipo</th>
					<th>Referencia</th>
					<th>Cantidad</th>
					<th>Nro Estante</th>

					<th>Opciones</th>
				</thead>
               @foreach ($equipos as $equipo)
				<tr>
					
					<td>{{ $equipo->idEquipo}}</td>
					
					<td>{{ $equipo->NombreEquipo}}</td>
					<td>{{ $equipo->Referencia}}</td>
					<td>{{ $equipo->Cantidad}}</td>
					<td>{{ $equipo->NroEstante}}</td>
				
					<td>
						@can('edit equipo')
						<a href="{{URL::action('App\Http\Controllers\EquipoControlador@edit',$equipo->idEquipo)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete equipo')
                        <a href="" data-target="#modal-delete-{{$equipo->idEquipo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show equipo')
                        <a href="{{URL::action('App\Http\Controllers\EquipoControlador@show',$equipo->idEquipo)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('equipo.modal')
				@endforeach
			</table>
		</div>
		{{$equipos->render()}}
	</div>
</div>

@endsection