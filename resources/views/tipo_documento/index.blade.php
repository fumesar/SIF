@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tipo_documento @can('create tipo_documento')<a href="tipo_documento/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('tipo_documento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Tipo Documento</th>
					<th>Tipo Documento</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tipo_documentos as $tipo_documento)
				<tr>
					
					<td>{{ $tipo_documento->idTipoDocumento}}</td>
					<td>{{ $tipo_documento->TipoDocumento}}</td>
					<td>
						@can('edit tipo_documento')
						<a href="{{URL::action('App\Http\Controllers\Tipo_documentoControlador@edit',$tipo_documento->idTipoDocumento)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete tipo_documento')
                        <a href="" data-target="#modal-delete-{{$tipo_documento->idTipoDocumento}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show tipo_documento')
                        <a href="{{URL::action('App\Http\Controllers\Tipo_documentoControlador@show',$tipo_documento->idTipoDocumento)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('tipo_documento.modal')
				@endforeach
			</table>
		</div>
		{{$tipo_documentos->render()}}
	</div>
</div>

@endsection