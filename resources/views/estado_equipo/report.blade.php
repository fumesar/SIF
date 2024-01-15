@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte De Estado Equipo</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Estado_equipo(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdEstadoEquipo</th>
					<th>EstadoEquipo</th>
				</thead>
               @foreach ($estado_equipos as $estado_equipo)
				<tr>
					
					<td>{{ $estado_equipo->idEstadoEquipo}}</td>
					<td>{{ $estado_equipo->EstadoEquipo}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$estado_equipos->render()}}
	</div>
</div>

@endsection