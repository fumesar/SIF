@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tercero @can('create tercero')<a href="tercero/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>
               @foreach ($terceros as $tercero)
				<tr>
					
					<td>{{ $tercero->tipo_documento}}</td>
					<td>{{ $tercero->NumeroDocumento}}</td>
					<td>{{ $tercero->Nombres}}</td>
					<td>{{ $tercero->Apellidos}}</td>
					<td>{{ $tercero->Telefono}}</td>
					<td>
						@can('edit tercero')
						<a href="{{URL::action('App\Http\Controllers\TerceroControlador@edit',$tercero->idTercero)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete tercero')
                        <a href="" data-target="#modal-delete-{{$tercero->idTercero}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show tercero')
                        <a href="{{URL::action('App\Http\Controllers\TerceroControlador@show',$tercero->idTercero)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('tercero.modal')
				@endforeach
			</table>
		</div>
		{{$terceros->render()}}
	</div>
</div>

@endsection