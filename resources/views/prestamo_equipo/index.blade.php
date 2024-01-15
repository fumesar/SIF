@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Prestamo Equipo @can('create prestamo_equipo')<a href="prestamo_equipo/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('prestamo_equipo.search')
	</div>
</div>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>No</th>
					<th>Nro Documento</th>
					<th>Equipo</th>
					<th>Referencia</th>
					<th>Fecha Vencimiento</th>
					<th>Nota</th>
					<th>Opciones</th>
				</thead>
               @foreach ($prestamo_equipos as $key => $prestamo_equipo)
				<tr>
					
					<td>{{ $key + 1 }}</td>
					<td>{{ $prestamo_equipo->NroDocumento}}</td>
					<td>{{ $prestamo_equipo->NombreEquipo_equipo}}</td>
					<td>{{ $prestamo_equipo->Referencia}}</td>
					<td>{{ $prestamo_equipo->FechaVencimiento}}</td>
					<td>{{ $prestamo_equipo->Nota}}</td>
					<td>
						@can('edit prestamo_equipo')
						<a href="{{URL::action('App\Http\Controllers\Prestamo_equipoControlador@edit',$prestamo_equipo->idPrestamoEquipo)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete prestamo_equipo')
                        <a href="" data-target="#modal-delete-{{$prestamo_equipo->idPrestamoEquipo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show prestamo_equipo')
                        <a href="{{URL::action('App\Http\Controllers\Prestamo_equipoControlador@show',$prestamo_equipo->idPrestamoEquipo)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
                        @can('edit prestamo_equipo')
                        @if($prestamo_equipo->Nota=='En Prestamo')
                        <a href="" data-target="#modal-devolver-{{$prestamo_equipo->idPrestamoEquipo}}" data-toggle="modal"><button class="btn btn-danger">Regresar</button></a>
                        @endif
                        @endcan
					</td>
				</tr>
				@include('prestamo_equipo.modal')
				@include('prestamo_equipo.modal-devolver')
				@endforeach
			</table>
		</div>
		{{$prestamo_equipos->render()}}
	</div>
</div>

@endsection