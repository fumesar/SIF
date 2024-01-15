@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Estado_matricula(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Estado_matricula(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdEstadoMatricula</th>
					<th>EstadoMatricula</th>
				</thead>
               @foreach ($estado_matriculas as $estado_matricula)
				<tr>
					
					<td>{{ $estado_matricula->idEstadoMatricula}}</td>
					<td>{{ $estado_matricula->EstadoMatricula}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$estado_matriculas->render()}}
	</div>
</div>

@endsection