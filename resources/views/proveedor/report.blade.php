@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Proveedor(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Proveedor(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdProveedor</th>
					<th>Tipo_documento</th>
					<th>NumeroDocumento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Direccion</th>
					<th>Departamento_residencia</th>
					<th>CiudadResidencia</th>
					<th>Telefono</th>
					<th>Celular</th>
					<th>PersonaContacto</th>
					<th>PaginaWeb</th>
					<th>Correo</th>
				</thead>
               @foreach ($proveedors as $proveedor)
				<tr>
					
					<td>{{ $proveedor->idProveedor}}</td>
					<td>{{ $proveedor->tipo_documento}}</td>
					<td>{{ $proveedor->NumeroDocumento}}</td>
					<td>{{ $proveedor->Nombres}}</td>
					<td>{{ $proveedor->Apellidos}}</td>
					<td>{{ $proveedor->Direccion}}</td>
					<td>{{ $proveedor->departamento_residencia}}</td>
					<td>{{ $proveedor->CiudadResidencia}}</td>
					<td>{{ $proveedor->Telefono}}</td>
					<td>{{ $proveedor->Celular}}</td>
					<td>{{ $proveedor->PersonaContacto}}</td>
					<td>{{ $proveedor->PaginaWeb}}</td>
					<td>{{ $proveedor->Correo}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$proveedors->render()}}
	</div>
</div>

@endsection