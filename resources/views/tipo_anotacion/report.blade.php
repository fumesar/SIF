@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Tipo_anotacion(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Tipo_anotacion(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdTipoAnotacion</th>
					<th>TipoAnotacion</th>
				</thead>
               @foreach ($tipo_anotacions as $tipo_anotacion)
				<tr>
					
					<td>{{ $tipo_anotacion->idTipoAnotacion}}</td>
					<td>{{ $tipo_anotacion->TipoAnotacion}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$tipo_anotacions->render()}}
	</div>
</div>

@endsection