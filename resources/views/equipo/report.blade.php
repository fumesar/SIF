@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte De Equipo</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Equipo(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th class="text text-center">IdEquipo</th>

					<th class="text text-center">NombreEquipo</th>
					<th class="text text-center">Referencia</th>
					<th class="text text-center">Cantidad</th>
					<th class="text text-center">NroEstante</th>
					
				</thead>
               @foreach ($equipos as $equipo)
				<tr>
					
					<td>{{ $equipo->idEquipo}}</td>	
					
					<td>{{ $equipo->NombreEquipo}}</td>
					<td>{{ $equipo->Referencia}}</td>
					<td>{{ $equipo->Cantidad}}</td>
					<td>{{ $equipo->NroEstante}}</td>
					
				</tr>
				@endforeach
			</table>
		</div>
		{{$equipos->render()}}
	</div>
</div>

@endsection