@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Tipo_documento(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Tipo_documento(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdTipoDocumento</th>
					<th>TipoDocumento</th>
				</thead>
               @foreach ($tipo_documentos as $tipo_documento)
				<tr>
					
					<td>{{ $tipo_documento->idTipoDocumento}}</td>
					<td>{{ $tipo_documento->TipoDocumento}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$tipo_documentos->render()}}
	</div>
</div>

@endsection