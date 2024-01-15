@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Matricular(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Matricular(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdMatricula</th>
					<th>Semestre</th>
					<th>Documento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Curso</th>
					<th>Estado_matricula</th>
				</thead>
               @foreach ($matriculars as $matricular)
				<tr>
					
					<td>{{ $matricular->idMatricula}}</td>
					<td>{{ $matricular->semestre}}</td>
					
					<td>{{ $matricular->Documento}}</td>
					<td>{{ $matricular->Nombres}}</td>
					<td>{{ $matricular->Apellidos}}</td>
					<td>{{ $matricular->curso}}</td>
					<td>{{ $matricular->estado_matricula}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$matriculars->render()}}
	</div>
</div>

@endsection