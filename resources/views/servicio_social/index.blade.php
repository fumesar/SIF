@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	@can('create servicio_social')
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Servicio Social @can('create servicio_social')<a href="servicio_social/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
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
					<th <th class="text text-center">Numero Documento</th>
					<th <th class="text text-center">Nombres</th>
					<th <th class="text text-center">Apellidos</th>
					<th <th class="text text-center">Opciones</th>
				</thead>
               @foreach ($servicio_socials as $servicio_social)
				<tr>
					
					<!-- <td>{{ $servicio_social->tipo_documento}}</td> -->
					<td>{{ $servicio_social->NumeroDocumento}}</td>
					<td>{{ $servicio_social->Nombres}}</td>
					<td>{{ $servicio_social->Apellidos}}</td>
					<td>
						@can('edit servicio_social')
						<a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@edit',$servicio_social->idServicioSocial)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
						@can('delete servicio_social')
                        <a href="" data-target="#modal-delete-{{$servicio_social->idServicioSocial}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show servicio_social')
                        <a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@show',$servicio_social->idServicioSocial)}}"><button class="btn btn-success">Ver</button></a>
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