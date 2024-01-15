@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Curso_colegio(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Curso_colegio(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdCursoCol</th>
					<th>Curso</th>
				</thead>
               @foreach ($curso_colegios as $curso_colegio)
				<tr>
					
					<td>{{ $curso_colegio->idCursoCol}}</td>
					<td>{{ $curso_colegio->Curso}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$curso_colegios->render()}}
	</div>
</div>

@endsection