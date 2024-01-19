@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	@can('create servicio_social')
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Servicio Social @can('create servicio_social')<a href="servicio_social/create"><img src="{{asset('img/NUEVO.png')}}" type="image/png" height="40px" width="40px" style="margin-left: 10px;"></a>@endcan</h3>
		@include('servicio_social.search2')
	</div>
	@endcan
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
					
					<!-- <th>Tipo Documento</th> -->
					<th class="text text-center">Numero Documento</th>
					<th class="text text-center">Nombres</th>
					<th class="text text-center">Apellidos</th>
					<th class="text text-center">Opciones</th>
				</thead>
               @foreach ($servicio_socials as $servicio_social)
				<tr>
					
					<!-- <td>{{ $servicio_social->tipo_documento}}</td> -->
					<td>{{ $servicio_social->NumeroDocumento}}</td>
					<td>{{ $servicio_social->Nombres}}</td>
					<td>{{ $servicio_social->Apellidos}}</td>
					<td class="text-center">
						@can('edit servicio_social')
						<a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@edit',$servicio_social->idServicioSocial)}}"><img src="{{asset('img/EDITAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
						@endcan
						@can('delete servicio_social')
                        <a href="" data-target="#modal-delete-{{$servicio_social->idServicioSocial}}" data-toggle="modal"><img src="{{asset('img/ELIMINAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
                        @endcan
                        @can('show servicio_social')
                        <a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@show',$servicio_social->idServicioSocial)}}"><img src="{{asset('img/VER.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
                        @endcan
					</td>
				</tr>
				@include('servicio_social.modal')
				@endforeach
			</table>
		</div>
		{{ $servicio_socials->appends(["searchText"=>$searchText])->links() }}
	</div>
</div>

@endsection