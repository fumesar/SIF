@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Tercero(s)</h3>
	</div>
</div>
@include('tercero.search')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Tercero(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdTercero</th>
					<th>NumeroDocumento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Telefono</th>
				</thead>
               @foreach ($terceros as $tercero)
				<tr>
					
					<td>{{ $tercero->idTercero}}</td>
					<td>{{ $tercero->NumeroDocumento}}</td>
					<td>{{ $tercero->Nombres}}</td>
					<td>{{ $tercero->Apellidos}}</td>
					<td>{{ $tercero->Telefono}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$terceros->render()}}
	</div>
</div>

@endsection