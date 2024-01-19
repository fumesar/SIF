@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Equipo @can('create equipo')<a href="equipo/create"><img src="{{asset('img/NUEVO.png')}}" type="image/png" height="40px" width="40px" style="margin-left: 10px;"></a>@endcan</h3>
		@include('equipo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th class="text text-center">Id Equipo</th>
					<th class="text text-center">Nombre Equipo</th>
					<th class="text text-center">Referencia</th>
					<th class="text text-center">Cantidad</th>
					<th class="text text-center">Nro Estante</th>
					<th class="text text-center">Opciones</th>
				</thead>
               @foreach ($equipos as $equipo)
				<tr>
					
					<td class="text-center">{{ $equipo->idEquipo}}</td>
					<td>{{ $equipo->NombreEquipo}}</td>
					<td>{{ $equipo->Referencia}}</td>
					<td class="text-center">{{ $equipo->Cantidad}}</td>
					<td class="text-center">{{ $equipo->NroEstante}}</td>
					<td class="text-center">
						@can('edit equipo')
						<a href="{{URL::action('App\Http\Controllers\EquipoControlador@edit',$equipo->idEquipo)}}"><img src="{{asset('img/EDITAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
						@endcan
                        @can('delete equipo')
                        <a href="" data-target="#modal-delete-{{$equipo->idEquipo}}" data-toggle="modal"><img src="{{asset('img/ELIMINAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
                        @endcan
                        @can('show equipo')
                        <a href="{{URL::action('App\Http\Controllers\EquipoControlador@show',$equipo->idEquipo)}}"><img src="{{asset('img/VER.png')}}" type="image/png" height="30px" width="30px">
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