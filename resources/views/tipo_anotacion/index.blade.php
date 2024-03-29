@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tipo_anotacion @can('create tipo_anotacion')<a href="tipo_anotacion/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('tipo_anotacion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Tipo Anotacion</th>
					<th>Tipo Anotacion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tipo_anotacions as $tipo_anotacion)
				<tr>
					
					<td>{{ $tipo_anotacion->idTipoAnotacion}}</td>
					<td>{{ $tipo_anotacion->TipoAnotacion}}</td>
					<td>
						@can('edit tipo_anotacion')
						<a href="{{URL::action('App\Http\Controllers\Tipo_anotacionControlador@edit',$tipo_anotacion->idTipoAnotacion)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete tipo_anotacion')
                        <a href="" data-target="#modal-delete-{{$tipo_anotacion->idTipoAnotacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show tipo_anotacion')
                        <a href="{{URL::action('App\Http\Controllers\Tipo_anotacionControlador@show',$tipo_anotacion->idTipoAnotacion)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('tipo_anotacion.modal')
				@endforeach
			</table>
		</div>
		{{$tipo_anotacions->render()}}
	</div>
</div>

@endsection