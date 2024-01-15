@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Estado_asistencia(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Estado_asistencia(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdEstadoAsistencia</th>
					<th>EstadoAsistencia</th>
				</thead>
               @foreach ($estado_asistencias as $estado_asistencia)
				<tr>
					
					<td>{{ $estado_asistencia->idEstadoAsistencia}}</td>
					<td>{{ $estado_asistencia->EstadoAsistencia}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$estado_asistencias->render()}}
	</div>
</div>

@endsection