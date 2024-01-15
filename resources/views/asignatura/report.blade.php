@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Asignatura(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Asignatura(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdAsignatura</th>
					<th>NombreAsignatura</th>
					<th>Curso</th>
					<th>Instructor</th>
					<th>Estado</th>
				</thead>
               @foreach ($asignaturas as $asignatura)
				<tr>
					
					<td>{{ $asignatura->idAsignatura}}</td>
					<td>{{ $asignatura->NombreAsignatura}}</td>
					<td>{{ $asignatura->curso}}</td>
					<td>{{ $asignatura->instructor}}</td>
					<td>{{ $asignatura->estado}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$asignaturas->render()}}
	</div>
</div>

@endsection