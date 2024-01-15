@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte De Prestamo Equipo</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Prestamo_equipo(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>No.</th>
					<th>NroDocumento</th>
					<th>Equipo</th>
					<th>Referencia</th>
					<th>FechaVencimiento</th>
					<th>Nota</th>
				</thead>
               @foreach ($prestamo_equipos as $key => $prestamo_equipo)
				<tr>
					
					<td>{{ $key + 1}}</td>
					<td>{{ $prestamo_equipo->NroDocumento}}</td>
					<td>{{ $prestamo_equipo->NombreEquipo_equipo}}</td>
					<td>{{ $prestamo_equipo->Referencia}}</td>
					<td>{{ $prestamo_equipo->FechaVencimiento}}</td>
					<td>{{ $prestamo_equipo->Nota}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$prestamo_equipos->render()}}
	</div>
</div>

@endsection