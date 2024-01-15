@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Departamento_residencia(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Departamento_residencia(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdDepartamentoResidencia</th>
					<th>DepartamentoResidencia</th>
				</thead>
               @foreach ($departamento_residencias as $departamento_residencia)
				<tr>
					
					<td>{{ $departamento_residencia->idDepartamentoResidencia}}</td>
					<td>{{ $departamento_residencia->DepartamentoResidencia}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$departamento_residencias->render()}}
	</div>
</div>

@endsection