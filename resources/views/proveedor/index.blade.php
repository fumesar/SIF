@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedor @can('create proveedor')<a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('proveedor.search')
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
					<th>Opciones</th>
				</thead>
               @foreach ($proveedors as $proveedor)
				<tr>
					
					<td>{{ $proveedor->tipo_documento}}</td>
					<td>{{ $proveedor->NumeroDocumento}}</td>
					<td>{{ $proveedor->Nombres}}</td>
					<td>{{ $proveedor->Apellidos}}</td>
					<td>
						@can('edit proveedor')
						<a href="{{URL::action('App\Http\Controllers\ProveedorControlador@edit',$proveedor->idProveedor)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete proveedor')
                        <a href="" data-target="#modal-delete-{{$proveedor->idProveedor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show proveedor')
                        <a href="{{URL::action('App\Http\Controllers\ProveedorControlador@show',$proveedor->idProveedor)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('proveedor.modal')
				@endforeach
			</table>
		</div>
		{{$proveedors->render()}}
	</div>
</div>

@endsection