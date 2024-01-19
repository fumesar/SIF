@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Prestamo Equipo @can('create prestamo_equipo')<a href="prestamo_equipo/create"><img src="{{asset('img/NUEVO.png')}}" type="image/png" height="40px" width="40px" style="margin-left: 10px;"></a>@endcan</h3>
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
					
					<th class="text text-center">No.</th>
					<th class="text text-center">No. De Documento</th>
					<th class="text text-center">Equipo</th>
					<th class="text text-center">Referencia</th>
					<th class="text text-center">Fecha Vencimiento</th>
					<th class="text text-center">Nota</th>
					<th class="text text-center">Opciones</th>
				</thead>
               @foreach ($prestamo_equipos as $key => $prestamo_equipo)
				<tr>
					
					<td class="text text-center">{{ $key + 1 }}</td>
					<td>{{ $prestamo_equipo->NroDocumento}}</td>
					<td>{{ $prestamo_equipo->NombreEquipo_equipo}}</td>
					<td class="text text-center">{{ $prestamo_equipo->Referencia}}</td>
					<td class="text text-center">{{ $prestamo_equipo->FechaVencimiento}}</td>
					<td class="text text-center">{{ $prestamo_equipo->Nota}}</td>
					<td class="text-center">
						@can('edit prestamo_equipo')
						<a href="{{URL::action('App\Http\Controllers\Prestamo_equipoControlador@edit',$prestamo_equipo->idPrestamoEquipo)}}"><img src="{{asset('img/EDITAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
						@endcan
                        @can('delete prestamo_equipo')
                        <a href="" data-target="#modal-delete-{{$prestamo_equipo->idPrestamoEquipo}}" data-toggle="modal"><img src="{{asset('img/ELIMINAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
                        @endcan
                        @can('show prestamo_equipo')
                        <a href="{{URL::action('App\Http\Controllers\Prestamo_equipoControlador@show',$prestamo_equipo->idPrestamoEquipo)}}"><img src="{{asset('img/VER.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
                        @endcan
                        @can('edit prestamo_equipo')
                        @if($prestamo_equipo->Nota=='En Prestamo')
                        <a href="" data-target="#modal-devolver-{{$prestamo_equipo->idPrestamoEquipo}}" data-toggle="modal"><img src="{{asset('img/REGRESAR PRESTAMO.png')}}" type="image/png" height="30px" width="30px">
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