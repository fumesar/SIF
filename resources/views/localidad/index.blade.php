@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Localidad @can('create localidad')<a href="localidad/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('localidad.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Localidad</th>
					<th>Localidad</th>
					<th>Opciones</th>
				</thead>
               @foreach ($localidads as $localidad)
				<tr>
					
					<td>{{ $localidad->idLocalidad}}</td>
					<td>{{ $localidad->Localidad}}</td>
					<td>
						@can('edit localidad')
						<a href="{{URL::action('App\Http\Controllers\LocalidadControlador@edit',$localidad->idLocalidad)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete localidad')
                        <a href="" data-target="#modal-delete-{{$localidad->idLocalidad}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show localidad')
                        <a href="{{URL::action('App\Http\Controllers\LocalidadControlador@show',$localidad->idLocalidad)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('localidad.modal')
				@endforeach
			</table>
		</div>
		{{$localidads->render()}}
	</div>
</div>

@endsection