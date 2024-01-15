@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Tipo_tercero(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Tipo_tercero(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdTipoTercero</th>
					<th>TipoTercero</th>
				</thead>
               @foreach ($tipo_terceros as $tipo_tercero)
				<tr>
					
					<td>{{ $tipo_tercero->idTipoTercero}}</td>
					<td>{{ $tipo_tercero->TipoTercero}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$tipo_terceros->render()}}
	</div>
</div>

@endsection