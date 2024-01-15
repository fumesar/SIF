@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Curso(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Curso(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th <th class="text text-center">IdCurso</th>
					<th <th class="text text-center">NombreCurso</th>
					<th <th class="text text-center">Estado</th>
				</thead>
               @foreach ($cursos as $curso)
				<tr>
					
					<td>{{ $curso->idCurso}}</td>
					<td>{{ $curso->NombreCurso}}</td>
					<td>{{ $curso->estado}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$cursos->render()}}
	</div>
</div>

@endsection