@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tipo_tercero @can('create tipo_tercero')<a href="tipo_tercero/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('tipo_tercero.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Tipo Tercero</th>
					<th>Tipo Tercero</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tipo_terceros as $tipo_tercero)
				<tr>
					
					<td>{{ $tipo_tercero->idTipoTercero}}</td>
					<td>{{ $tipo_tercero->TipoTercero}}</td>
					<td>
						@can('edit tipo_tercero')
						<a href="{{URL::action('App\Http\Controllers\Tipo_terceroControlador@edit',$tipo_tercero->idTipoTercero)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete tipo_tercero')
                        <a href="" data-target="#modal-delete-{{$tipo_tercero->idTipoTercero}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show tipo_tercero')
                        <a href="{{URL::action('App\Http\Controllers\Tipo_terceroControlador@show',$tipo_tercero->idTipoTercero)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('tipo_tercero.modal')
				@endforeach
			</table>
		</div>
		{{$tipo_terceros->render()}}
	</div>
</div>

@endsection