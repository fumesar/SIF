@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Semestre(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Semestre(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdSemestre</th>
					<th>Semestre</th>
					<th>FechaInicio</th>
					<th>FechaFinal</th>
				</thead>
               @foreach ($semestres as $semestre)
				<tr>
					
					<td>{{ $semestre->idSemestre}}</td>
					<td>{{ $semestre->Semestre}}</td>
					<td>{{ $semestre->FechaInicio}}</td>
					<td>{{ $semestre->FechaFinal}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$semestres->render()}}
	</div>
</div>

@endsection