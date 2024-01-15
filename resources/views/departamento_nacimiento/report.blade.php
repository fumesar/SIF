@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Departamento_nacimiento(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Departamento_nacimiento(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdDepartamentoNacimiento</th>
					<th>DepartamentoNacimiento</th>
				</thead>
               @foreach ($departamento_nacimientos as $departamento_nacimiento)
				<tr>
					
					<td>{{ $departamento_nacimiento->idDepartamentoNacimiento}}</td>
					<td>{{ $departamento_nacimiento->DepartamentoNacimiento}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$departamento_nacimientos->render()}}
	</div>
</div>

@endsection