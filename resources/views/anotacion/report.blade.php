@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Anotacion(s)</h3>
	</div>
</div>
@include('anotacion.search_report')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Anotacion(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdAnotacion</th>
					<th>Jefatura</th>
					<th>Identificacion</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Tipo_anotacion</th>
					<th>Fecha</th>
					<th>Titulo</th>
					<th>Falta</th>
					<th>Observacion</th>
				</thead>
               @foreach ($anotacions as $anotacion)
				<tr>
					
					<td>{{ $anotacion->idAnotacion}}</td>
					<td>{{ $anotacion->jefatura}}</td>
					<td>{{ $anotacion->Identificacion}}</td>
					<td>{{ $anotacion->Nombres}}</td>
					<td>{{ $anotacion->Apellidos}}</td>
					<td>{{ $anotacion->tipo_anotacion}}</td>
					<td>{{ $anotacion->Fecha}}</td>
					<td>{{ $anotacion->Titulo}}</td>
					<td>{{ $anotacion->falta}}</td>
					<td>{{ $anotacion->Observacion}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$anotacions->render()}}
	</div>
</div>

@endsection